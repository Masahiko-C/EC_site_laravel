<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/admin.css">
  <script src="/js/app.js" defer></script>
</head>
<body>
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