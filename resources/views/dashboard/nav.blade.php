<header class="px-3">
    <nav class="d-flex flex-column flex-md-row py-3 border-bottom ">
        <a class="nav-link px-5 {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="/dashboard/products">PRODUCTS</a>
        <a class="nav-link px-5 {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">CATEGORIES</a>
        <a class="nav-link px-5 {{ Request::is('dashboard/brands*') ? 'active' : '' }}" href="/dashboard/brands">BRANDS</a>
        <a class="nav-link px-5 {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">USERS</a>
        {{-- <a class="nav-link px-5 {{ request()->routeIs('dashboard.products') ? 'active' : '' }}" href="{{ route('dashboard.products') }}">PRODUCTS</a>
        <a class="nav-link px-5 {{ request()->routeIs('dashboard.categories') ? 'active' : '' }}" href="{{ route('dashboard.categories') }}">CATEGORIES</a>
        <a class="nav-link px-5 {{ request()->routeIs('dashboard.brands') ? 'active' : '' }}" href="{{ route('dashboard.brands') }}">BRANDS</a>
        <a class="nav-link px-5 {{ request()->routeIs('dashboard.users') ? 'active' : '' }}" href="{{ route('dashboard.users') }}">USERS</a> --}}
        {{-- //if (auth()->check) --}}
        {{-- @guest

        @endguest --}}

        @auth
            @if (auth()->user()?->user_role === 'superadmin' & Request::is('dashboard*'))
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
            @endif
        @else
            <a class="nav-link ms-auto" href="/register">REGISTER</a>
            <a class="nav-link" href="/login">LOGIN</a>
        @endauth
    </nav>
</header>
