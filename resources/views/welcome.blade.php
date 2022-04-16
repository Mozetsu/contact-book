<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" value="{{ csrf_token() }}"/>
        <title>Contact Book</title>
        <link href="{{ 'css/app.css' }}" type="text/css" rel="stylesheet"/>
        <script defer src="{{ 'js/app.js' }}" type="module"></script>
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
