<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/base/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/common.css') }}">

    @yield('style')

    <title>FashionablyLate</title>
</head>

<body>

    @include('components.header', [
    'headerNav' => trim($__env->yieldContent('header-nav'))
])

    <main>
        @yield('page')
    </main>

</body>

</html>
