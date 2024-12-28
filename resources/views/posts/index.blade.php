@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    <form action="{{ route('posts.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search posts...">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </div>
    </form>

    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->author }} - {{ $post->date }}</h6>
                <p class="card-text">{{ Str::limit(strip_tags($post->content), 200) }}</p>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">Read More</a>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-secondary">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
</div>
@endsection