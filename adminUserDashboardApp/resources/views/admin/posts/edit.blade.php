@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Post</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control" required>
            </div>

            {{-- Body --}}
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea name="body" id="body" rows="4" class="form-control" required>{{ old('body', $post->body) }}</textarea>
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Image (optional)</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($post->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $post->image) }}" width="200" alt="Post Image">
                    </div>
                @endif
            </div>

            {{-- Hidden user_id (don’t change author) --}}
            <input type="hidden" name="user_id" value="{{ $post->user_id }}">

            <button type="submit" class="btn btn-success">Update Post</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
