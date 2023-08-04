@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}

<main>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" method="GET" class="row g-3 search-form">
                        <div class="col-12 col-md-3">
                            <div class="search">
                                <label for="search" class="form-label">Product Name</label>

                                <input type="text" class="form-control" placeholder="Search..." name="search"
                                    value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="product_category" class="form-label">Category</label>
                            <select class="form-select" name="category"  id="categorySelect">
                                <option value="">All</option>
                                @foreach ($categories as $category)
                                    @if (!$category->parent_id)
                                        @include('pages.category_option', ['categor2' => $category, 'depth' => 0])
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="product_brand" class="form-label">Brand</label>
                            <select id="product_brand" name="brand" class="form-select">
                                <option value="">All</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->slug }}"
                                        {{ isset($currentBrand) && $currentBrand->is($brand) ? 'selected' : '' }}>{{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <button class="btn custom-success text-white">Search</button>
                        </div>
                    </form>

                </div>
            </div>

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
                                {{-- <span class="price">{{ $product->author->name }}</span> --}}
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
