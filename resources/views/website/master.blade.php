<!DOCTYPE html>

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('meta_author')
    @yield('meta_description')
    @yield('meta_keywords')

    @include('website.includes.css.css')


</head>

<body>

@include('website.includes.header')

@yield('content')

@include('website.includes.footer')

{{--Js--}}

@include('website.includes.js.js')


</body>
</html>
