<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large">
    @unless($disableNavBar)
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">
            <i class="fa-solid fa-bars"></i>  Menu
        </button>
    @endunless
    <a class="w3-bar-item w3-left" href="{{ route('admin') }}"><span>Orange</span></a>
    @if (Session::has('admin'))
        <a class="w3-bar-item w3-right" href="{{ route('admin.logout') }}">Sign out</a>
    @endif
</div>

@if (!$disableNavBar && Session::has('admin'))
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="{{ asset(Session::get('admin')->profil) }}" class="w3-circle w3-margin-right" alt="">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Welcome, <strong>{{ Session::get('admin')->name }}</strong></span><br>
                <a href="{{ route('admin.help') }}" class="w3-bar-item w3-button"><i
                        class="fa-solid fa-envelope"></i></a>
                <a href="{{ route('admin') }}" class="w3-bar-item w3-button"><i class="fa-solid fa-user"></i></a>
                <a href="{{ route('products') }}" class="w3-bar-item w3-button"><i class="fa-solid fa-gear"></i></a>
            </div>
        </div>
        <hr class="mx-auto">
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa-solid fa-xmark"></i>  Close Menu</a>
            <a href="{{ route('admin') }}"
                class="w3-bar-item w3-button w3-padding {{ request()->routeIs('admin') ? 'w3-blue' : '' }}">
                <i class="fa-solid fa-chart-line fa-fw"></i>  Dashboard</a>
            <a href="{{ route('orders.index') }}"
                class="w3-bar-item w3-button w3-padding {{ request()->routeIs('orders.index') ? 'w3-blue' : '' }}">
                <i class="fa-solid fa-list-check fa-fw"></i>  Orders</a>
            <a href="{{ route('categories.index') }}"
                class="w3-bar-item w3-button w3-padding {{ request()->routeIs('categories.index') ? 'w3-blue' : '' }}">
                <i class="fa-solid fa-folder fa-fw"></i>  Categories</a>
            <a href="{{ route('categories.create') }}"
                class="w3-bar-item w3-button w3-padding {{ request()->routeIs('categories.create') ? 'w3-blue' : '' }}">
                <i class="fa-regular fa-folder fa-fw"></i>  Add New Category</a>
            <a href="{{ route('products') }}"
                class="w3-bar-item w3-button w3-padding {{ request()->routeIs('products') ? 'w3-blue' : '' }}">
                <i class="fa-solid fa-tags fa-fw"></i>  Products</a>
            <a href="{{ route('products.create') }}"
                class="w3-bar-item w3-button w3-padding {{ request()->routeIs('products.create') ? 'w3-blue' : '' }}">
                <i class="fa-solid fa-tag fa-fw"></i>  Add New Product</a>
            <a href="{{ route('admin') }}" class="w3-bar-item w3-button w3-padding ">
                <i class="fa-solid fa-user fa-fw"></i>  Account</a>
            <a href="{{ route('admin.help') }}"
                class="w3-bar-item w3-button w3-padding {{ request()->routeIs('admin.help') ? 'w3-blue' : '' }}">
                <i class="fa-solid fa-info fa-fw"></i>  Help</a>
        </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" title="close side menu"
        id="myOverlay">
    </div>
@endif
