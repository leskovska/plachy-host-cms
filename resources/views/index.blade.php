<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plachý host</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body x-data="{ active_tab: 'main'}" class="antialiased max-w-7xl m-auto bg-black">
        @include('sections.header')
        @include('sections.introduction')
        @include('sections.concerts')
        @include('sections.videos')
        @include('sections.footer')
        @livewireScripts
    </body>
</html>
