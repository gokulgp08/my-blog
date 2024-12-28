@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->name }}</h1>
    <p class="text-muted">{{ $post->author }} - {{ $post->date }}</p>
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid mb-3">
    @endif
    <div>{!! $post->content !!}</div>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back to Posts</a>
</div>
@endsection