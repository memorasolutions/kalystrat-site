<?php
declare(strict_types=1);

/**
 * Generate Kalystrat PWA icons (192, 512, 180).
 * Design : fond navy #0A1628, lettre K blanche, cercle gold #B8A472.
 */
$dir = __DIR__ . '/../public/icons';
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}
$dir = realpath($dir);
echo "Icons directory: $dir\n";

$icons = [
    ['size' => 192, 'file' => 'icon-192x192.png'],
    ['size' => 512, 'file' => 'icon-512x512.png'],
    ['size' => 180, 'file' => 'apple-touch-icon.png'],
];

foreach ($icons as $cfg) {
    $s = $cfg['size'];
    $im = imagecreatetruecolor($s, $s);
    imageantialias($im, true);

    $navy  = imagecolorallocate($im, 10, 22, 40);
    $gold  = imagecolorallocate($im, 184, 164, 114);
    $white = imagecolorallocate($im, 255, 255, 255);

    // Fond navy plein
    imagefill($im, 0, 0, $navy);

    // Cercle décoratif gold (épaisseur ≈ 1.5% taille)
    imagesetthickness($im, max(2, (int) round($s / 80)));
    $pad = (int) round($s * 0.08);
    imagearc($im, (int) ($s / 2), (int) ($s / 2), $s - 2 * $pad, $s - 2 * $pad, 0, 360, $gold);

    // Lettre K blanche centrée (rectangle vertical + 2 diagonales)
    $cx = (int) round($s / 2);
    $cy = (int) round($s / 2);
    $w  = (int) round($s * 0.32);
    $h  = (int) round($s * 0.46);
    $x1 = (int) ($cx - $w / 2);
    $y1 = (int) ($cy - $h / 2);
    $x2 = (int) ($cx + $w / 2);
    $y2 = (int) ($cy + $h / 2);
    $bar = (int) round($s * 0.08);

    // Trait vertical gauche
    imagefilledrectangle($im, $x1, $y1, $x1 + $bar, $y2, $white);

    // Branche haute (diagonale)
    $top = [
        $x1 + $bar,         $cy + 2,
        $x1 + $bar + 3,     $cy - 2,
        $x2,                $y1,
        (int) ($x2 - $bar / 2), $y1 + $bar,
        $x1 + $bar + 3 + $bar, $cy,
    ];
    imagefilledpolygon($im, $top, $white);

    // Branche basse (diagonale)
    $bot = [
        $x1 + $bar,         $cy - 2,
        $x1 + $bar + 3,     $cy + 2,
        $x2,                $y2,
        (int) ($x2 - $bar / 2), $y2 - $bar,
        $x1 + $bar + 3 + $bar, $cy,
    ];
    imagefilledpolygon($im, $bot, $white);

    $path = "$dir/{$cfg['file']}";
    imagepng($im, $path, 9);
    imagedestroy($im);

    $sz = filesize($path);
    echo "Created $path ({$cfg['size']}x{$cfg['size']}, " . number_format($sz) . " bytes)\n";
}
