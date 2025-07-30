@extends('layouts.app')

@section('content')
    <div class="container mt-5">



        <div class="card">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image" style="max-height: 400px; object-fit: cover;">
            @endif

            <div class="card-body">
                <p><strong>ID:</strong> {{ $post->id }}</p>
                <p><strong>Title:</strong> {{ $post->title }}</p>
                <p><strong>Body:</strong> {{ $post->body }}</p>
                <p><strong>Author:</strong> {{ $post->user->name ?? 'N/A' }}</p>
                <p><strong>Created:</strong> {{ $post->created_at->format('Y-m-d') }}</p>

                @if ($post->user_id === auth()->id())
                    <div class="d-flex justify-content-start mt-3">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning me-2">✏ Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">🗑 Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
