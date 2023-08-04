<tr>
    <td>
        <a href='/dashboard/category/{{ $category->id }}/edit' class='text-primary'>{{ str_repeat(' ↪ ', $depth) }}
            {{ $category->name }}</a>
    </td>

    <td>
        <a href='/dashboard/category/{{ $category->id }}/edit' class='btn text-white bg-twitter-blue custom-button'>edit</a>

        <form method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
            <button class="btn text-white bg-error custom-button delete_button">delete</button>
        </form>
    </td>
</tr>
@if ($category->children->count() > 0)
    @foreach ($category->children as $childCategory)
        @include('dashboard.categories.category_list', [
            'category' => $childCategory,
            'depth' => $depth + 1,
        ])
    @endforeach
@endif
