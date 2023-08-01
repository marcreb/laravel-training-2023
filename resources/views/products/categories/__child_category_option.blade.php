<option value="{{ $childCategory->id }}">{{ str_repeat('----', $depth) }}{{ $childCategory->name }}</option>
@if ($childCategory->children->count() > 0)
    @foreach ($childCategory->children as $grandChildCategory)
        @include('products.child_category_option', ['childCategory' => $grandChildCategory, 'depth' => $depth + 1, 'selectedCategories' => $selectedCategories])
    @endforeach
@endif
