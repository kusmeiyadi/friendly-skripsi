<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('user/layouts/head')
</head>

<body>

    @include('user/layouts/header')

    @section('main-content')

    @show

    @include('user/layouts/footer')

</body>

</html>
