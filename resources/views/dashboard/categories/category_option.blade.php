
@if(Route::is('dashboard.category.edit'))
    @if ($currentCategory != $category->id)
    <option
    value="{{ $category->id }}"


        @if($currentParentCategory === $category->id)
                selected
        @endif

>{{ str_repeat(' ↪ ', $depth) }}{{ $category->name }}</option>
    @endif


@else

    <option
        value="{{ $category->id }}"

        @if(Route::is('dashboard.product.edit'))
            @if($product->categories->contains('id', $category->id))
                selected
            @endif
        @endif

    >{{ str_repeat(' ↪ ', $depth) }}{{ $category->name }}</option>
@endif




@if ($category->children->count() > 0)
    @foreach ($category->children as $childCategory)
        @include('dashboard.categories.category_option', ['category' => $childCategory, 'depth' => $depth + 1])
    @endforeach
@endif
