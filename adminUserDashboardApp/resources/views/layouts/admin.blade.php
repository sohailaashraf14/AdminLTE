<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="{{ asset('adminlte/css/adminlte.min.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-link nav-link" type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="content-wrapper p-4">
        @yield('content')
    </div>
</div>
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
</body>
</html>
