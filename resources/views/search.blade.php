<form action="#" method="GET" class="row g-3 search-form">
    <div class="col-12 col-md-3">
        <div class="search">
            <label for="search" class="form-label">Product Name</label>

            <input type="text" class="form-control" placeholder="Search..." name="search"
                value="{{ request('search') }}">
        </div>
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
