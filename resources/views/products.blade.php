@extends ('layout')

@section('content')
    @foreach ($products as $product)
    <article class="{{ $loop->even ? 'even' : 'odd' }}">
        <h2><a href="/products/{{ $product->slug }}">{{ $product->name }}</a></h2>
        <p>By <a href="/authors/{{ $product->author->username }}">{{ $product->author->name }}</a></p>
        <p>{{ $product->price }}</p>
        <p><a href="/categories/{{ $product->category->slug }}"> {{ $product->category->name }} </a></p>
        <img src="/storage/images/{{$product->image}}">

    </article>
    <hr class="my-5">
    @endforeach

    {{-- @foreach ($posts as $post)
    <article class="{{ $loop->even ? 'even' : 'odd' }}">
        <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
        <p>{{ $post->excerpt }}</p>
        <p><a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a></p>
    </article>
    <hr class="my-5">
    @endforeach --}}

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif

        </div>
@endsection

