@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}
<main>
    <section class="py-5 container">

        <div class="row">
            <div class="col-12 pb-3">
                <a href="/dashboard/categories" class="float-end btn bg-error text-white">Go Back</a>
            </div>
        </div>
            <hr>

        <div class="row py-lg-5">

            <h1 class="border-bottom text-center pb-3 mb-5">EDIT CATEGORY</h1>

            <div class="col-lg-6 col-md-8 mx-auto card p-5">
            <form action="/dashboard/category/{{ $category->id }}" method="POST" class="justify-content-md-end">
                @csrf
                @method('PATCH')

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" tabindex="1" value="{{ $category->name }}">
                    <label for="name" class="form-label">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slug" tabindex="1" value="{{ $category->slug }}">
                    <label for="slug" class="form-label">Slug</label>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-bold w-100">Select Parent Category</label>
                    <select class="form-select" name="categories"  id="categorySelect">
                        <option value="">None</option>
                        @php
                            $currentParentCategory =  $category->parent_id;
                            $currentCategory =  $category->id;
                        @endphp

                        @foreach ($categories as $category)
                            @if (!$category->parent_id)
                                @include('dashboard.categories.category_option', [
                                    'category' => $category,
                                    'depth' => 0,
                                    'currentParentCategory' =>  $currentParentCategory,
                                    'currentCategory' =>  $currentCategory,
                                    ])
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn custom-success text-white float-end ">Save Category</button>
                <a href="/dashboard/categories" class="btn btn-danger text-white float-end mx-2 "><span>Cancel</span></a>
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

