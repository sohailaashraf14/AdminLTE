@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">← Back to Dashboard</a>
        </div>
        <div class="card">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="max-height:300px; object-fit:cover;">
            @endif
            <div class="card-body">
                <p><strong>ID:</strong> {{ $post->id }}</p>
                <p><strong>Title:</strong> {{ $post->title }}</p>
                <p><strong>Body:</strong> {{ $post->body }}</p>
                <p><strong>Author:</strong> {{ $post->user->name ?? 'N/A' }}</p>
                <p><strong>Created:</strong> {{ $post->created_at->format('Y-m-d') }}</p>
            </div>
        </div>

    </div>
@endsection
