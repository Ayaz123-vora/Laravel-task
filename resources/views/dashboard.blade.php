<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Welcome, {{ Auth::user()->name }}</h2>
 <link rel="stylesheet" href="{{ asset('theme/css/styles.css') }}">
<a href="{{ route('logout') }}">Logout</a>
<script src="{{ asset('theme/js/scripts.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
@yield('scripts')
</body>
</html>
