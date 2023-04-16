<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Domain Driven Design Multi Tenancy Tenancy</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="h-full">
    @yield('content')
    <script src="/js/app.js" defer></script>
</body>

</html>
