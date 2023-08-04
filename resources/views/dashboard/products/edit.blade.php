@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}
<main>

    <section class="py-5 container">

        <div class="row">
            <div class="col-12 pb-3">
                <a href="/dashboard/products" class="float-end btn bg-error text-white">Go Back</a>
            </div>
        </div>
        <hr>

        <div class="row py-lg-5">

            <h1 class="border-bottom text-center pb-3 mb-5">EDIT PRODUCT</h1>

            <div class="col-lg-6 col-md-8 mx-auto card p-5">
            <form action="/dashboard/products/" method="POST" class="justify-content-md-end" enctype="multipart/form-data">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" tabindex="1" value="{{ $product->name }}">
                    <label for="name" class="form-label">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slug" tabindex="1" value="{{ $product->slug }}">
                    <label for="slug" class="form-label">Slug</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="price" id="price" aria-describedby="price" step="any" tabindex="2" value="{{ $product->price }}">
                    <label for="price" class="form-label">Price</label>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-bold w-100">Category</label>

                    <select class="multiSelectTag form-select" name="categories[]" multiple="multiple" id="categorySelect">
                        @foreach ($categories as $category)
                            @if (!$category->parent_id)
                                @include('dashboard.categories.category_option', ['category' => $category, 'depth' => 0])
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label fw-bold w-100">Brand
                        <select class="form-select" name="brands[]" id="brandSelect">
                            @foreach ( $brands as $brand )
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                {{-- <div class="mb-3">
                    <label for="brand" class="form-label fw-bold w-100">Brand
                        <select class="multiSelectTag form-select" name="brands[]" multiple="multiple" id="brandSelect">
                            @foreach ( $brands as $brand )
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div> --}}

                <div class="mb-3">
                    <label for="featured_image" class="form-label fw-bold">Choose an image to upload for Featured Image<br></label>
                    <input type="file" name="image" id="featured_image" accept=".jpg, .jpeg, .png">
                    <br>
                    <small>
                        Accepted image file types are <span>( .jpg .png .gif )</span>,
                        and the file must be smaller than <span>2MB</span>.
                    </small>

                </div>
                <button type="submit" class="btn custom-success text-white float-end ">Save Product</button>
                <a href="/dashboard/products" class="btn btn-danger text-white float-end mx-2 "><span>Cancel</span></a>

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
