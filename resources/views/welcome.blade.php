<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>testing</title>
        <script src="https://cdn.tailwindcss.com"></script

    </head>
    <body class="antialiased">
       @livewire('user-table')
    </body>
</html>
