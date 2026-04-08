<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Tajawal:wght@400;700;900&display=swap" rel="stylesheet">
<style> body { font-family: 'Inter', 'Tajawal', sans-serif; } </style>
        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="bg-gray-100 antialiased min-h-screen">
    {{ $slot }}
</body>
</html>
