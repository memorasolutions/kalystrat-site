<!doctype html>
{{-- ================================================================== --}}
{{-- LAYOUT VERBATIM Tabler 1.4 — preview.tabler.io/layout-navbar-overlap.html --}}
{{-- Copyright 2018-2025 Paweł Kuna — Licensed under MIT --}}
{{-- Substitutions Laravel UNIQUEMENT (routes, user, avatar URL, form CSRF logout, @vite, @stack, @yield) --}}
{{-- AUCUNE modification de structure, classes, SVG, ou contenu démo des dropdowns. --}}
{{-- ================================================================== --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? __('Administration') }} &middot; {{ $adminBranding['site_name'] ?? config('app.name') }}</title>
    <meta name="msapplication-TileColor" content="{{ $adminBranding['primary'] ?? '#066fd1' }}" />
    <meta name="theme-color" content="{{ $adminBranding['primary'] ?? '#066fd1' }}" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />

    {{-- Branding dynamique CSS vars --}}
    <style>
        :root {
            --admintabler-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --tblr-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --tblr-primary-rgb: {{ implode(', ', sscanf($adminBranding['primary'] ?? '#066fd1', '#%02x%02x%02x')) }};
        }
    </style>

    {{-- BEGIN GLOBAL MANDATORY STYLES + PLUGINS STYLES + ICONS + Inter font --}}
    @vite(['Modules/AdminTabler/resources/assets/sass/app.scss'])
    {{-- END STYLES --}}

    @livewireStyles
    @stack('plugin-styles')
    @stack('styles')
</head>
<body>
    {{-- BEGIN GLOBAL THEME SCRIPT (anti-flash dark mode) --}}
    <script src="{{ asset('build/admintabler/tabler-theme.min.js') }}"></script>
    {{-- END GLOBAL THEME SCRIPT --}}
    <div class="page">
      <!-- BEGIN NAVBAR  -->
      <header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
        <div class="container-xl">
          <!-- BEGIN NAVBAR TOGGLER -->
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-menu"
            aria-controls="navbar-menu"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- END NAVBAR TOGGLER -->
          <!-- BEGIN NAVBAR LOGO -->
          <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('admin.dashboard') }}" aria-label="{{ config('app.name') }}"><svg xmlns="http://www.w3.org/2000/svg" width="183" height="32" viewBox="0 0 400 70" aria-hidden="true" class="navbar-brand-image">
  <!-- K-eye of Horus symbol - extracted from brand_kalystrat.svg (Gang Graf) -->
  <g transform="translate(2,5) scale(0.255) translate(-580,-1500)">
    <path d="M644.53,1608.89l-31.06,15.48c26.46,15.16,50.69,31.53,82.18,31.94,15.61-1.08,54.22-12.69,72.54-21.24v17.27c-18.53,8.54-55.95,18.48-71.8,19.1,6.91,5.01,12.69,9.86,19.72,14.22,15.94,9.88,33.55,17.36,52.08,21.18v17.4c-20.71-4.32-39.85-12.17-58.26-22.69-12.39-7.07-23.93-14.39-35.5-22.6l-22.92-16.27s-48.39-26.8-63.83-28.11l-8.32-.71v98.5h-17.08v-204.1h17.08v62.72c8.87-1.88,17.09-4.08,25.17-7.87l26.93-12.62c34.44-16.14,73.65-20.31,110.34-9.3,9.02,2.71,17.73,6.06,26.38,9.55v17.02c-9.44-3.99-18.82-7.85-28.66-11.33-11.09-3.92-22.12-5.04-34.39-5.71-37.01-2.03-60.33,10.02-91.57,25.36-11.01,5.41-22.06,9.18-34.2,10.9v12.14c8.17-1.19,15.79-3.52,23.51-7.06l42.6-19.53c34.86-15.98,71.86-14.56,106.87.48l15.83,6.8v14.66c-15.15-5.74-68.11-37.11-123.66-5.58ZM696.38,1614.72c-5.58,0-10.1,4.52-10.1,10.1s4.52,10.1,10.1,10.1,10.1-4.52,10.1-10.1-4.52-10.1-10.1-10.1Z" fill="#B8A472"/>
  </g>
  <!-- KALYSTRAT text - white for dark backgrounds -->
  <text x="58" y="35" font-family="'Akzidenz Grotesk','Helvetica Neue',Arial,sans-serif" font-weight="300" font-size="30" letter-spacing="0.06em" fill="#FFFFFF">KALYSTRAT</text>
  <!-- Subtitle -->
  <text x="58" y="54" font-family="'Akzidenz Grotesk','Helvetica Neue',Arial,sans-serif" font-weight="300" font-size="7.5" letter-spacing="0.22em" fill="#FFFFFF" opacity="0.8">Holding construction · Québec</text>
</svg></a>
          </div>
          <!-- END NAVBAR LOGO -->
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
              <div class="nav-item">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                  <!-- Download SVG icon from http://tabler.io/icons/icon/moon -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-1"
                  >
                    <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                  </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                  <!-- Download SVG icon from http://tabler.io/icons/icon/sun -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-1"
                  >
                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                  </svg>
                </a>
              </div>
              <div class="nav-item dropdown d-none d-md-flex">
                <a
                  href="#"
                  class="nav-link px-0"
                  data-bs-toggle="dropdown"
                  tabindex="-1"
                  aria-label="Show notifications"
                  data-bs-auto-close="outside"
                  aria-expanded="false"
                >
                  <!-- Download SVG icon from http://tabler.io/icons/icon/bell -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-1"
                  >
                    <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                  </svg>
                  <span class="badge bg-red"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header d-flex">
                      <h3 class="card-title">Notifications</h3>
                      <div class="btn-close ms-auto" data-bs-dismiss="dropdown"></div>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 1</a>
                            <div class="d-block text-secondary text-truncate mt-n1">Change deprecated html tags to text decoration classes (#29604)</div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon text-muted icon-2"
                              >
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 2</a>
                            <div class="d-block text-secondary text-truncate mt-n1">justify-content:between ⇒ justify-content:space-between (#29734)</div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions show">
                              <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon text-yellow icon-2"
                              >
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 3</a>
                            <div class="d-block text-secondary text-truncate mt-n1">Update change-version.js (#29736)</div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon text-muted icon-2"
                              >
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 4</a>
                            <div class="d-block text-secondary text-truncate mt-n1">Regenerate package-lock.json (#29730)</div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon text-muted icon-2"
                              >
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <a href="#" class="btn btn-2 w-100"> Archive all </a>
                        </div>
                        <div class="col">
                          <a href="#" class="btn btn-2 w-100"> Mark all as read </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="nav-item dropdown d-none d-md-flex me-3">
                <a
                  href="#"
                  class="nav-link px-0"
                  data-bs-toggle="dropdown"
                  tabindex="-1"
                  aria-label="Show app menu"
                  data-bs-auto-close="outside"
                  aria-expanded="false"
                >
                  <!-- Download SVG icon from http://tabler.io/icons/icon/apps -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-1"
                  >
                    <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                    <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                    <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                    <path d="M14 7l6 0" />
                    <path d="M17 4l0 6" />
                  </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title">My Apps</div>
                      <div class="card-actions btn-actions">
                        <a href="#" class="btn-action">
                          <!-- Download SVG icon from http://tabler.io/icons/icon/settings -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-1"
                          >
                            <path
                              d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"
                            />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                          </svg>
                        </a>
                      </div>
                    </div>
                    <div class="card-body scroll-y p-2" style="max-height: 50vh">
                      <div class="row g-0">
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/amazon.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Amazon</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/android.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Android</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/app-store.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Apple App Store</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/apple-podcast.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Apple Podcast</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/apple.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Apple</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/behance.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Behance</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/discord.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Discord</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/dribbble.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Dribbble</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/dropbox.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Dropbox</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/ever-green.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Ever Green</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/facebook.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Facebook</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/figma.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Figma</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/github.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">GitHub</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/gitlab.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">GitLab</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-ads.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Ads</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-adsense.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google AdSense</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-analytics.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Analytics</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-cloud.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Cloud</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-drive.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Drive</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-fit.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Fit</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-home.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Home</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-maps.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Maps</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-meet.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Meet</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-photos.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Photos</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-play.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Play</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-shopping.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Shopping</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google-teams.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google Teams</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/google.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Google</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/instagram.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Instagram</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/klarna.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Klarna</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/linkedin.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">LinkedIn</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/mailchimp.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Mailchimp</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/medium.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Medium</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/messenger.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Messenger</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/meta.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Meta</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/monday.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Monday</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/netflix.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Netflix</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/notion.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Notion</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/office-365.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Office 365</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/opera.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Opera</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/paypal.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">PayPal</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/petreon.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Patreon</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/pinterest.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Pinterest</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/play-store.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Play Store</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/quora.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Quora</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/reddit.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Reddit</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/shopify.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Shopify</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/skype.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Skype</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/slack.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Slack</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/snapchat.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Snapchat</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/soundcloud.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">SoundCloud</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/spotify.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Spotify</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/stripe.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Stripe</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/telegram.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Telegram</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/tiktok.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">TikTok</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/tinder.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Tinder</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/trello.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Trello</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/truth.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Truth</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/tumblr.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Tumblr</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/twitch.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Twitch</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/twitter.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Twitter</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/vimeo.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Vimeo</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/vk.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">VK</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/watppad.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Wattpad</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/webflow.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Webflow</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/whatsapp.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">WhatsApp</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/wordpress.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">WordPress</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/xing.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Xing</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/yelp.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Yelp</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/youtube.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">YouTube</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/zapier.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Zapier</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/zendesk.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Zendesk</span>
                          </a>
                        </div>
                        <div class="col-4">
                          <a href="#" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                            <img src="./static/brands/zoom.svg" class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="" />
                            <span class="h5">Zoom</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=066fd1&color=fff&size=64)"> </span>
                <div class="d-none d-xl-block ps-2">
                  <div>{{ auth()->user()->name }}</div>
                  <div class="mt-1 small text-secondary">{{ auth()->user()->roles->first()?->name ?? __('Utilisateur') }}</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" data-bs-theme="light">
                <a href="#" class="dropdown-item">Status</a>
                <a href="{{ route('admin.profile') }}" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Feedback</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.settings.index') }}" class="dropdown-item">Settings</a>
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('admintabler-logout-form').submit();">Logout</a>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
                        <!-- BEGIN NAVBAR MENU -->
            @inject('navService', 'Modules\Backoffice\Services\NavigationService')
            @php
                $kSections = $navService->getNavigation(auth()->user());
                $kBadges = $navService->getBadges();
            @endphp
            <ul class="navbar-nav">
              @foreach($kSections as $sIdx => $section)
                @php
                    $items = $section['items'] ?? [];
                    $hasChildren = false;
                    $sectionActive = false;
                    foreach ($items as $item) {
                        if (!empty($item['children'])) { $hasChildren = true; }
                        if (isset($item['route'])) {
                            $wild = str_replace('.index', '.*', $item['route']);
                            if (request()->routeIs($item['route']) || request()->routeIs($wild)) { $sectionActive = true; }
                        }
                        if (!empty($item['children'])) {
                            foreach ($item['children'] as $child) {
                                if (isset($child['route'])) {
                                    $wild = str_replace('.index', '.*', $child['route']);
                                    if (request()->routeIs($child['route']) || request()->routeIs($wild)) { $sectionActive = true; }
                                }
                            }
                        }
                    }
                    $simpleSingle = (count($items) === 1 && empty($items[0]['children']));
                @endphp
                @if($simpleSingle)
                  @php $item = $items[0]; $isActive = isset($item['route']) && request()->routeIs(str_replace('.index', '.*', $item['route'])); @endphp
                  <li class="nav-item {{ $isActive ? 'active' : '' }}">
                    <a class="nav-link" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="ti ti-{{ $section['icon'] ?? 'circle' }}" style="width:24px;height:24px;font-size:18px;"></i>
                      </span>
                      <span class="nav-link-title"> {{ __($section['label']) }} </span>
                    </a>
                  </li>
                @else
                  <li class="nav-item dropdown {{ $sectionActive ? 'active' : '' }}">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#navbar-section-{{ $sIdx }}"
                      data-bs-toggle="dropdown"
                      data-bs-auto-close="outside"
                      role="button"
                      aria-expanded="false"
                    >
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="ti ti-{{ $section['icon'] ?? 'circle' }}" style="width:24px;height:24px;font-size:18px;"></i>
                      </span>
                      <span class="nav-link-title"> {{ __($section['label']) }} </span>
                    </a>
                    <div class="dropdown-menu">
                      @if($hasChildren)
                        <div class="dropdown-menu-columns">
                          @foreach($items as $item)
                            <div class="dropdown-menu-column">
                              @if(!empty($item['children']))
                                <div class="dropdown-header">{{ __($item['label']) }}</div>
                                @foreach($item['children'] as $child)
                                  @php
                                      $childWild = isset($child['route']) ? str_replace('.index', '.*', $child['route']) : '';
                                      $childActive = isset($child['route']) && (request()->routeIs($child['route']) || request()->routeIs($childWild));
                                  @endphp
                                  <a class="dropdown-item {{ $childActive ? 'active' : '' }}" href="{{ isset($child['route']) ? route($child['route']) : '#' }}">{{ __($child['label']) }}</a>
                                @endforeach
                              @else
                                @php
                                    $itemWild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                                    $itemActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($itemWild));
                                @endphp
                                <a class="dropdown-item {{ $itemActive ? 'active' : '' }}" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                                  {{ __($item['label']) }}
                                  @if(isset($item['route'], $kBadges[$item['route']]))
                                    <span class="badge bg-red ms-auto">{{ $kBadges[$item['route']] }}</span>
                                  @endif
                                </a>
                              @endif
                            </div>
                          @endforeach
                        </div>
                      @else
                        @foreach($items as $item)
                          @php
                              $itemWild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                              $itemActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($itemWild));
                          @endphp
                          <a class="dropdown-item {{ $itemActive ? 'active' : '' }}" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                            {{ __($item['label']) }}
                            @if(isset($item['route'], $kBadges[$item['route']]))
                              <span class="badge bg-red ms-auto">{{ $kBadges[$item['route']] }}</span>
                            @endif
                          </a>
                        @endforeach
                      @endif
                    </div>
                  </li>
                @endif
              @endforeach
            </ul>
            <!-- END NAVBAR MENU -->
          </div>
        </div>
      </header>
      <!-- END NAVBAR  -->

      <div class="page-wrapper">
        <!-- BEGIN PAGE HEADER -->
        <div class="page-header d-print-none text-white" aria-label="Page header">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">{{ $subtitle ?? __('Administration') }}</div>
                <h2 class="page-title">{{ $title ?? __('Tableau de bord') }}</h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">@yield('page-actions')</div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE HEADER -->

        {{-- BEGIN PAGE BODY --}}
        <div class="page-body">
          <div class="container-xl">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible mb-3" role="alert">
                    <div>{{ session('success') }}</div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                    <div>{{ session('error') }}</div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                </div>
            @endif

            @yield('content')
          </div>
        </div>
        {{-- END PAGE BODY --}}
        <!--  BEGIN FOOTER  -->
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="{{ url('/') }}" target="_blank" class="link-secondary" rel="noopener">{{ __('Voir le site') }}</a></li>
                  
                  <li class="list-inline-item">
                    <a href="https://memora.solutions" target="_blank" class="link-secondary" rel="noopener">MEMORA solutions</a>
                  </li>
                  <li class="list-inline-item d-none">
                    <a href="#" class="link-secondary">
                      <!-- Download SVG icon from http://tabler.io/icons/icon/heart -->
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon text-pink icon-inline icon-4"
                      >
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                      </svg>
                      Sponsor
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; {{ date('Y') }}
                    <a href="{{ url('/') }}" class="link-secondary">{{ config('app.name') }}</a>. All rights reserved.
                  </li>
                  <li class="list-inline-item">
                    
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>

      </div>
    </div>

    {{-- Form caché Logout (CSRF Laravel obligatoire) --}}
    <form id="admintabler-logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
        @csrf
    </form>

    {{-- Toasts Memora (compat) --}}
    @includeIf('backoffice::partials.toast-notifications')

    {{-- Tabler core JS --}}
    @vite(['Modules/AdminTabler/resources/assets/js/app.js'])

    @livewireScripts
    @stack('plugin-scripts')
    @stack('custom-scripts')
    @stack('scripts')
  </body>
</html>
