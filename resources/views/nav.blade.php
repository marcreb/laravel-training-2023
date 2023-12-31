<header class="px-3">
    <nav class="d-flex flex-column flex-md-row py-3 border-bottom">
        <a class="nav-link px-5 {{ Request::is('product-category/tv*') ? 'active' : '' }}" href="/product-category/tv">TV</a>
        <a class="nav-link px-5 {{ Request::is('product-category/electric-fan*') ? 'active' : '' }}" href="/product-category/electric-fan">ELECTRIC FAN</a>
        <a class="nav-link px-5 {{ Request::is('product-category/oven*') ? 'active' : '' }}" href="/product-category/oven">OVEN</a>
        <a class="nav-link px-5 {{ Request::is('product-category/lights*') ? 'active' : '' }}" href="/product-category/lights">LIGHTS</a>
        <a class="nav-link px-5 {{ Request::is('product-category/refrigerator*') ? 'active' : '' }}" href="/product-category/refrigerator">REFRIGERATOR</a>


        {{-- //if (auth()->check) --}}
        {{-- @guest

        @endguest --}}

        @auth
            @if (auth()->user()?->user_role === 'superadmin')
                <form class="d-flex ms-auto" action="/logout" method="POST">
                    @csrf

                    <div class="dropdown">
                        <a class="btn  dropdown-toggle border-end m-0 align-self-center pe-3 text-white shadow-none" href="#"
                            role="button"
                            id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, {{ auth()->user()->name }}!
                        </a>
                        <ul class="dropdown-menu w-100 text-center">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="/dashboard/products/create"><span class="">+</span> Add Product</a></li>
                            <li><a class="dropdown-item" href="/dashboard/categories/create"><span class="">+</span> Add Category</a></li>
                            <li><a class="dropdown-item" href="/dashboard/brands/create"><span class="">+</span> Add Brand</a></li>
                            <li><a class="dropdown-item" href="/dashboard/users/create"><span class="">+</span> Add User</a></li>
                        </ul>
                    </div>
                    <button class="btn logout">LOGOUT</button>
                </form>
            @else
                <form class="d-flex ms-auto" action="/logout" method="POST">
                    @csrf
                    <span class="border-end m-0 align-self-center pe-3 text-white">Welcome, {{ auth()->user()->name }}!</span>
                    <button class="btn logout">LOGOUT</button>
                </form>
            @endif
        @else
            <a class="nav-link ms-auto {{ Request::is('register') ? 'active' : '' }}" href="/register">REGISTER</a>
            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login">LOGIN</a>
        @endauth
    </nav>
</header>
