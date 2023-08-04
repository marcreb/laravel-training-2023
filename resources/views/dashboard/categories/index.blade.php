@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}

    <main class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>Dashboard | Categories</h1>
                </div>
                <div class="col-md-8 mb-3">
                    <a href="/dashboard/categories/create" class="btn custom-success text-white float-end green-button"><i
                            class="plus-icon ">+</i><span>Add Category</span></a>
                </div>
            </div>
            <section class="container-fluid data-container">
                <div class="row py-5">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped align-middle datatables-no-sorting"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 80%">Category name</th>

                                        <th style="width: 20%">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        @if (!$category->parent_id)
                                            @include('dashboard.categories.category_list', [
                                                'category' => $category,
                                                'depth' => 0,
                                            ])
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
    </main>
@endsection
