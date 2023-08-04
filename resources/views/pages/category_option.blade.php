<option value="{{ $category->slug }}" {{ isset($currentCategory) && $currentCategory->is($category) ? 'selected' : '' }}>{{ str_repeat(' ↪ ', $depth) }}{{ $category->name }}</option>
@if ($category->children->count() > 0)
    @foreach ($category->children as $childCategory)
        @include('pages.category_option', ['category' => $childCategory, 'depth' => $depth + 1])
    @endforeach
@endif
