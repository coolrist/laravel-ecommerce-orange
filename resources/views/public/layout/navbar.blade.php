<!-- Navbar-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
            <div onclick="window.location.href='/';" class="logo">
                <img class="logo-symbol" src="{{ asset('/assets/public/img/logo.svg') }}" alt="Logo">
                <h2 class="logo-brand">Orange</h2>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">{{ __('layout.nav.0') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop') }}">{{ __('layout.nav.1') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('layout.nav.2') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">{{ __('layout.nav.3') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-cart" href="{{ route('cart') }}/">
                            <i class="fa-solid fa-bag-shopping fa-beat"></i>
                            @if (Session::has('cart'))
                                <span class="nav-cart-quantity">{{ Session::get('cart')->totalQty }}</span>
                            @endif
                        </a>
                        <a href="{{ route('user') }}"><i class="fa-solid fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
