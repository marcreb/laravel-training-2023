@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}
<main>
    <section class="py-5">
        <div class="container">
            @if (! Request::is('authors/*'))
            <div class="row">
                <div class="col-12">
                    @include('search')
                </div>
            </div>
            @endif


            <div class="row">

                @if ($products->count())
                @foreach ($products as $product)
                <div class="col-lg-2 col-md-6 col-20 my-3">
                    <div class="card">
                        <div class="imagebox"
                            style="background-image: url({{ $product->image ? asset('storage/' . $product->image) : "https://placehold.co/150x150" }}">
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center">
                                <a href="../product/{{ $product->slug }}"><strong>{{ $product->name }}</strong></a><br>


                                <span class="price pt-3 d-block">@money($product->price)</span><br>
                                {{-- @if ($product->brands->count() > 0)
                                    Brands:
                                    @foreach ($product->brands as $brand)
                                        {{ $brand->name }}
                                        @unless ($loop->last)
                                            ,
                                        @endunless
                                    @endforeach
                                    <br>
                                @endif<br> --}}
                                {{-- {{ $product->price }}<br>
                                {{ $product->author->name }} --}}
                            </p>
                        </div>
                    </div>
                </div>

                @endforeach

                @else
                <p>No Products Found</p>
                @endif
                <div class="my-5 d-flex align-items-center  flex-column">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
