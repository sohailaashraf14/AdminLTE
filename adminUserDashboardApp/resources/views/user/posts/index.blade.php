@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <h2 class="mb-2 mb-md-0">All Posts</h2>
            <div>
                <a href="{{ route('home') }}" class="btn btn-secondary me-2 mb-2 mb-md-0">🏠 Back to Home</a>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">➕ Create Post</a>
            </div>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- List of Posts --}}
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4 d-flex">
                    <div class="card flex-fill shadow-sm">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid" alt="Post Image" style="max-height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                </a>
                            </h5>
                            <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                            <p class="text-muted mb-2">By: {{ $post->user->name ?? 'Unknown' }}</p>

                            @if ($post->user_id === auth()->id())
                                <div class="mt-auto d-flex justify-content-between">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No posts found.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
