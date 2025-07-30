@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>User Details</h2>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $user->id }}</p>
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            </div>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">← Back to Dashboard</a>
    </div>
@endsection
