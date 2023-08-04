@extends ('layout')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="/storage/{{$product->image}}">

            </div>

            <div class="col-12 col-md-6">
                <h1>{{ $product->name; }}</h1>
                <hr>
                <p>By <a href="/authors/{{ $product->author->username }}">{{ $product->author->name }}</a></p>
                <p>Price: @money($product->price)</p>

                @if ($product->categories->count() > 0)
                                    <p>Categories:
                                    @foreach ($product->categories as $category)
                                        {{ $category->name }}
                                        @unless ($loop->last)
                                            ,
                                        @endunless
                                    @endforeach
                                    </p>
                                @endif

                                @if ($product->brands->count() > 0)
                                Brand:
                                @foreach ($product->brands as $brand)
                                    {{ $brand->name }}
                                    @unless ($loop->last)
                                        ,
                                    @endunless
                                @endforeach
                                <br>
                            @endif<br>
                {{-- <p>Categories: <a href="/categories/{{ $product->category->slug }}"> {{ $product->category->name }} </a></p> --}}
            </div>
            <div class="reviews-section ">
                <h2 class="text-center col-12 mt-5">Product Reviews</h2>
                <hr class="mb-5">
                <div class="row">
                    <div class="col-12 col-md-6 ">
                        @foreach ( $product->reviews as $review )

                            <div class="card p-3 text-center px-4 mb-3">

                                <div class="user-image">
                                    @if (!empty($review->author->profile_picture))
                                        <img src="/storage/{{ $review->author->profile_picture }}" class="rounded-circle mb-2" width="80">
                                    @else
                                        <img src="https://dummyimage.com/300x300/#eeeee/0011ff" class="rounded-circle mb-2" width="80">
                                    @endif
                                </div>

                                <div class="user-content">

                                    <h6 class="mb-3">{{ ucwords($review->author->name)}}</h6>
                                    {{-- <time>{{ $review->created_at->diffForHumans() }}</time> --}}
                                    <p>Posted
                                    <time>{{ $review->created_at->format('F j, Y, g:i a') }}</time>
                                    </p>
                                    <hr>
                                    <p>{{ $review->body }}</p>

                                </div>
                            </div>

                        @endforeach

                    </div>
                    <div class="addReview col-12 col-md-6">
                        <div class="card p-4 mb-3">

                            @auth
                            <form method="POST" action="/product/{{ $product->slug }}/reviews">
                                @csrf

                                <div class="form-group">
                                <label for="body" class="mb-2">You can submit your review below</label>
                                <textarea class="form-control" name="body" rows="3" placeholder="Something to say?" required></textarea>
                                @error('body')
                                    <div class="text-danger mt-2 small">{{ $message }}</div>
                                @enderror
                                </div>
                                <button type="submit" class="btn btn-primary my-3 float-end">Submit Review</button>
                            </form>
                            @else
                            <p> Please <a href="/login">login</a> or <a href="/register">register</a> to submit a review
                            </p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
