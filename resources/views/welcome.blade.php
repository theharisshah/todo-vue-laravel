<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <title>Todo Vue</title>
        <meta name="base_url" content="{{config('app.api_url')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
    </body>
    <script src="{{mix('js/app.js')}}"></script>
</html>
