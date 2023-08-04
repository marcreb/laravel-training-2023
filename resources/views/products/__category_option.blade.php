<option value="{{ $category->id }}">{{ str_repeat('▪ ', $depth) }}{{ $category->name }}</option>
@if ($category->children->count() > 0)
    @foreach ($category->children as $childCategory)
        @include('products.category_option', ['category' => $childCategory, 'depth' => $depth + 1])
    @endforeach
@endif
