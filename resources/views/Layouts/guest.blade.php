<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title') - My Shop</title>

  <!-- Critical CSS -->
  <style>
    /* small critical inline CSS (e.g. centering the form) */
    body, html { height: 100%; margin: 0; }
    .auth-container { display: flex; align-items: center; justify-content: center; height: 100%; }
  </style>

  <!-- Non‑critical Stylesheet -->
 <!-- Load stylesheet normally while debugging -->
 <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

  <div class="auth-container">
    <div class="card p-4 shadow-sm" style="min-width:300px;">
      @yield('content')
    </div>
  </div>

  <!-- Deferred JS -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
