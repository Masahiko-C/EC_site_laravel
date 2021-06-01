<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/app.css">
  <script src="/js/app.js" defer></script>
</head>
<body>
  @include('navbar')

  <div class="container py-4">
    @include('flash::message')
    @include('errors.form_errors')
    @yield('content')
  </div>

</body>

</html>