@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>🛠 Admin Dashboard</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger">🚪 Logout</button>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Users Section --}}
        <div class="mb-5">
            <h4>👥 All Users</h4>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-3">➕ Add New User</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this user?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- Posts Section --}}
        <div>
            <h4>📝 All Posts</h4>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">➕ Add New Post</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th><th>Title</th><th>Author</th><th>Image</th><th>Created</th><th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->user->name ?? 'N/A' }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="width: 80px; height: 60px; object-fit: cover;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this post?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
