@extends ('layout')

@section('content')
    <p>By <a href="/authors/{{ $product->author->username }}">{{ $product->author->name }}</a></p>

    <h1>{{ $product->name; }}</h1>
    <p>{!! $product->price !!}</p>
    <img src="/storage/images/{{$product->image}}">
    <p><a href="/categories/{{ $product->category->slug }}"> {{ $product->category->name }} </a></p>
@endsection
