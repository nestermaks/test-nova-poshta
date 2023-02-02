<!DOCTYPE html>
<html dir="ltr" lang="{{ $locale }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{ $page->name[$locale] }}</title>
  <meta name="author" content="Maksym Nesterenko">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @vite('resources/js/app.js')
</head>

<body class='container w-full md:max-w-3xl mx-auto pt-20'>
  @yield('content')
</body>

</html>
