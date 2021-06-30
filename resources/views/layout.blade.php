<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/admin.css">
  <script src="/js/app.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body class="bg-white">
  @include('navbar')

  <div class="container py-4">
    @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    @include('errors.form_errors')
    @yield('content')
  </div>
</body>

</html>