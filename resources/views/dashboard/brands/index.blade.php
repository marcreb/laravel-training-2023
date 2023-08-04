@extends ('layout')

@section('content')
    {{-- //@foreach ($products->skip(1) as $product) --}}

    <main class="p-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
                <h1>Dashboard | Brands</h1>
            </div>
            <div class="col-md-8 mb-3">

                <a href="/dashboard/brands/create" class="btn custom-success text-white float-end green-button"><i class="plus-icon ">+</i><span>Add Brand</span></a>

            </div>
        </div>
        <section class="container-fluid data-container">
          <div class="row py-5">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-striped align-middle datatables" style="width:100%">
                  <thead>
                    <tr>
                        <th style="width: 20%">Brand name</th>
                        <th style="width: 15%">Categories Assigned</th>
                        <th style="width: 15%">Actions</th>

                    </tr>
                  </thead>
                  <tbody>

                  @foreach ($brands as $brand)
                    <tr>
                      <td>
                        <a href='/dashboard/brand?id={{ $brand->id }}' class='text-primary'>{{ $brand->name }}</a>
                      </td>
                      <td>
                        @if ($brand->categories->count() > 0)
                        @foreach ($brand->categories as $category)
                            {{ $category->name }}
                            @unless ($loop->last)
                                ,
                            @endunless
                        @endforeach
                    @endif
                      </td>

                      <td>
                        <a href='/dashboard/brand?id={{ $brand->id }}' class='btn text-white bg-twitter-blue custom-button'>edit</a>

                        <form method="POST" class="d-inline">
                            @csrf
                          <input type="hidden" name="id" value="{{ $brand->id }}">
                          <button class="btn text-white bg-error custom-button delete_button">delete</button>
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
