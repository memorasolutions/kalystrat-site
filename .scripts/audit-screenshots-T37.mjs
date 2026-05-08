import { chromium } from 'playwright';
import fs from 'fs/promises';
import path from 'path';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);
const PROJECT_ROOT = path.resolve(__dirname, '..');

const BASE_URL = 'https://kalystrat.test';
const VIEWPORTS = [
  { name: 'desktop', width: 1920, height: 1080 },
  { name: 'tablet', width: 768, height: 1024 },
  { name: 'mobile', width: 375, height: 667 }
];
const URLS = [
  { path: '/', slug: 'home' },
  { path: '/a-propos', slug: 'about' },
  { path: '/services', slug: 'services' },
  { path: '/realisations', slug: 'realisations' },
  { path: '/contact', slug: 'contact' },
  { path: '/faq', slug: 'faq' },
  { path: '/carrieres', slug: 'carrieres' },
  { path: '/conseil-consultatif', slug: 'conseil' },
  { path: '/partenaires', slug: 'partenaires' },
  { path: '/zones-desservies', slug: 'zones' },
  { path: '/filiales/fondations', slug: 'filiale-fondations' },
  { path: '/credits', slug: 'credits' }
];
const OUTPUT_DIR = path.join(PROJECT_ROOT, '.handoffs', 'audit_visuel_S30');
const RESULTS_FILE = path.join(OUTPUT_DIR, '_results.json');

const results = [];

const disableAnimations = `
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
`;

async function captureScreenshots() {
  const browser = await chromium.launch({ headless: true });
  try {
    for (const { path: urlPath, slug } of URLS) {
      const fullUrl = `${BASE_URL}${urlPath}`;
      for (const viewport of VIEWPORTS) {
        const viewportDir = path.join(OUTPUT_DIR, viewport.name);
        await fs.mkdir(viewportDir, { recursive: true });

        const screenshotPath = path.join(viewportDir, `${slug}.jpg`);
        const resultEntry = {
          url: fullUrl,
          slug,
          viewport: viewport.name,
          statusCode: null,
          jsErrors: [],
          consoleErrors: [],
          screenshotPath: path.relative(PROJECT_ROOT, screenshotPath)
        };

        try {
          const context = await browser.newContext({
            viewport: { width: viewport.width, height: viewport.height },
            ignoreHTTPSErrors: true
          });
          const page = await context.newPage();

          page.on('pageerror', err => {
            resultEntry.jsErrors.push(err.toString());
          });

          page.on('console', msg => {
            if (msg.type() === 'error') {
              resultEntry.consoleErrors.push(msg.text());
            }
          });

          const response = await page.goto(fullUrl, {
            waitUntil: 'networkidle',
            timeout: 15000
          });

          resultEntry.statusCode = response ? response.status() : null;

          await page.addStyleTag({ content: disableAnimations });

          await page.screenshot({
            path: screenshotPath,
            type: 'jpeg',
            quality: 85,
            fullPage: true
          });

          await context.close();
          results.push(resultEntry);
          console.log(`✓ ${fullUrl}@${viewport.name} (${resultEntry.statusCode})`);
        } catch (error) {
          results.push({ ...resultEntry, error: error.message });
          console.log(`✗ ${fullUrl}@${viewport.name}: ${error.message}`);
        }
      }
    }
  } finally {
    await browser.close();
  }

  await fs.writeFile(RESULTS_FILE, JSON.stringify(results, null, 2));
  console.log(`\n📁 Results: ${RESULTS_FILE}`);
}

captureScreenshots().catch(err => {
  console.error('Fatal:', err);
  process.exit(1);
});
