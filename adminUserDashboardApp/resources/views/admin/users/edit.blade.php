@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit User</h2>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input name="name" class="form-control" value="{{ $user->name }}" required>
            </div>



            <div class="mb-3">
                <label>Email</label>
                <input name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button class="btn btn-success">Update User</button>
        </form>
    </div>
@endsection
