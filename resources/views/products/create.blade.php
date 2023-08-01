@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}
<main>
    <section class="py-5 container">

        <div class="row">
            <div class="col-12 pb-3">
                <a href="/dashboard/products" class="float-end btn bg-error text-white">Cancel Add</a>
            </div>
        </div>
            <hr>

        <div class="row py-lg-5">

            <h1 class="border-bottom text-center pb-3 mb-5">ADD PRODUCT</h1>

            <div class="col-lg-6 col-md-8 mx-auto card p-5">
            <form action="/register" method="POST" class="justify-content-md-end">
                @csrf

                <div class="form-floating mb-3">
                    <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" tabindex="1" value="{{ old('name') }}">
                    <label for="name" class="form-label">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="price" class="form-control" name="price" id="price" aria-describedby="price" tabindex="2" value="{{ old('price') }}">
                    <label for="price" class="form-label">Price</label>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-bold w-100">Category</label>
                    <select class="multiSelectTag form-select" name="categories[]" multiple="multiple" id="categorySelect">
                        @foreach ($categories as $category)
                            @if (!$category->parent_id)
                                @include('products.category_option', ['category' => $category, 'depth' => 0])
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label fw-bold w-100">Brand
                        <select class="multiSelectTag form-select" name="brands[]" multiple="multiple" id="brandSelect">
                            @foreach ( $brands as $brand )
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <button type="submit" class="btn custom-success text-white green-button"><i class="plus-icon ">+</i><span>SAVE</span></button>
                @if ($errors->any())
                    <ul class="mt-3">
                    @foreach ($errors->all() as $error )
                        <li class="small text-danger">{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif

                </form>
          </div>
        </div>
    </section>
</main>
@endsection
