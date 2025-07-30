@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" required value="{{ old('title', $post->title) }}">
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body:</label>
                <textarea name="body" class="form-control" rows="5" required>{{ old('body', $post->body) }}</textarea>
            </div>

            @if($post->image)
                <div class="mb-3">
                    <label class="form-label">Current Image:</label><br>
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail" style="max-height: 200px;">
                </div>
            @endif

            <div class="mb-3">
                <label for="image" class="form-label">Change Image (optional):</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
