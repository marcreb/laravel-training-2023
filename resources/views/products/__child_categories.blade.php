@foreach ($childCategories as $childCategory)
    @if (!in_array($childCategory->id, $selectedCategories))
        <option value="{{ $childCategory->id }}">{{ str_repeat($prefix, $depth) }} {{ $childCategory->name }}</option>

    @endif
@endforeach
