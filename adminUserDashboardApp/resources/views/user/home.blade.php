@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Welcome, {{ Auth::user()->name }}!</h2>

            {{-- Logout Button --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">🚪 Logout</button>
            </form>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">You are logged in!</h5><br><br>

                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">🛠 View Admin Dashboard</a>
                @else
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">📂 View Posts</a>
                @endif

            </div>
        </div>

    </div>
@endsection
