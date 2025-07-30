@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-3">All Posts</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">➕ Create Post</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @forelse($posts as $post)
                <div class="col-md-6">
                    <div class="card mb-3">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="max-height: 300px; object-fit: cover;" alt="Post Image">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="card-img-top" style="max-height: 300px; object-fit: cover;" alt="Default Image">
                        @endif

                        <div class="card-body">
                            <h5>{{ $post->title }}</h5>
                            <p>{{ $post->body }}</p>

                            <p class="text-muted">
                                By: {{ $post->user->name ?? 'Unknown Author' }}
                            </p>

                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete post?')">🗑️ Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posts available.</p>
            @endforelse
        </div>
    </div>
@endsection
