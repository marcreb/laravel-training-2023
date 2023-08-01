<header>
    <nav class="d-flex flex-column flex-md-row py-3 border-bottom ">
        <a class="nav-link px-5" href="/product-category/tv">TV</a>
        <a class="nav-link px-5" href="/product-category/electric-fan">ELECTRIC FAN</a>
        <a class="nav-link px-5" href="/product-category/oven">OVEN</a>
        <a class="nav-link px-5" href="/product-category/lights">LIGHTS</a>
        {{-- //if (auth()->check) --}}
        {{-- @guest

        @endguest --}}

        @auth

            <form class="d-flex ms-auto" action="/logout" method="POST">
                @csrf
                <span class="border-end m-0 align-self-center pe-3 text-white">Welcome, {{ auth()->user()->name }}!</span>
                <button class="btn logout">LOGOUT</button>
            </form>
        @else
            <a class="nav-link ms-auto" href="/register">REGISTER</a>
            <a class="nav-link" href="/login">LOGIN</a>
        @endauth
    </nav>
</header>
