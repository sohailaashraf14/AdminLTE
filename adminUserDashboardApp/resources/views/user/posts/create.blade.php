@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Create New Post</h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>There were some problems with your input:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Post Form --}}
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
            </div>

            {{-- Body --}}
            <div class="mb-3">
                <label for="body" class="form-label">Post Content</label>
                <textarea name="body" id="body" rows="5" class="form-control" required>{{ old('body') }}</textarea>
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image (optional)</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            {{-- Buttons --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">⬅️ Back</a>
                <button type="submit" class="btn btn-success">💾 Save Post</button>
            </div>
        </form>
    </div>
@endsection
