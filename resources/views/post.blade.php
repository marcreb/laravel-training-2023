@extends ('layout')

@section('content')
    <p>By <a href="{{ $post->user->name }}">{{ $post->user->name }}</a></p>
    <h1>{{ $post->title; }}</h1>
    <p>{!! $post->body !!}</p>
    <p><a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a></p>
@endsection
