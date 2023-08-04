@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}

    <main class="p-5">
        <div class="container">
            <div class="row">
                 <div class="col-md-4">
                    <h1>Dashboard | Products</h1>
                </div>
                <div class="col-md-8 mb-3">
                    <a href="/dashboard/products/create" class="btn custom-success text-white float-end green-button"><i
                            class="plus-icon ">+</i><span>Add Product</span></a>

                </div>
            </div>
            <section class="container-fluid data-container">
                <div class="row py-5">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped align-middle datatables" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">Name</th>
                                        <th style="width: 15%">Price</th>
                                        <th style="width: 15%">Category</th>
                                        <th style="width: 15%">Brand</th>
                                        <th style="width: 15%">Image</th>
                                        <th style="width: 20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <a href='/dashboard/product?id={{ $product->id }}'
                                                    class='text-primary'>{{ $product->name }}</a>
                                            </td>
                                            <td>
                                                <span class='price'>@money($product->price)</span>
                                            </td>
                                            <td>
                                                @if ($product->categories->count() > 0)
                                                    @foreach ($product->categories as $category)
                                                        {{ $category->name }}
                                                        @unless ($loop->last)
                                                            ,
                                                        @endunless
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->brands->count() > 0)
                                                    @foreach ($product->brands as $brand)
                                                        {{ $brand->name }}
                                                        @unless ($loop->last)
                                                            ,
                                                        @endunless
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="image-crop">
                                                    <img style="max-width: 75px;"
                                                        src='{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/150x150' }}'
                                                        alt="{{ $product->name }}" />
                                                </div>
                                            </td>
                                            <td>
                                                <a href='/dashboard/product/{{ $product->id }}/edit'
                                                    class='btn text-white bg-twitter-blue custom-button'>edit</a>

                                                <form method="POST" class="d-inline">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                                    <input type="hidden" name="published" value="0">
                                                    <button
                                                        class="btn text-white bg-error custom-button delete_button">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
    </main>
@endsection
