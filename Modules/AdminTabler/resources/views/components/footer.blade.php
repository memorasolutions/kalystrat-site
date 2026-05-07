{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- Footer Tabler --}}
<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        <a href="{{ url('/') }}" class="link-secondary" target="_blank" rel="noopener">
                            {{ __('Voir le site') }} <i class="ti ti-external-link ms-1"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright © {{ date('Y') }}
                        <a href="{{ url('/') }}" class="link-secondary">{{ config('app.name') }}</a>
                    </li>
                    <li class="list-inline-item">
                        {{ __('Conçu et hébergé au Canada par') }}
                        <a href="https://memora.solutions" class="link-secondary" target="_blank" rel="noopener">MEMORA solutions</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
