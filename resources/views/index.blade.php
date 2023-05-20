<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plachý host</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-main bg-[-100px] sm:bg-left-top bg-no-repeat bg-fixed bg-cover">
        @include('sections.header')
        @include('sections.introduction')
        @include('sections.concerts')
        @include('sections.videos')
        @include('sections.footer')
    </body>
</html>
