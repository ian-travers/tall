<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@isset($title) {{ $title }} -@endisset {{ config('app.name', 'NFSU Cup') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css', 'build') }}">
    @livewireStyles
</head>
<body class="antialiased min-h-screen flex flex-col">
<x-header></x-header>
<main class="flex-grow bg-nfsu-map bg-no-repeat bg-cover bg-fixed">
    @if ($alert = session('status'))
        <x-alert-message type="{{ $alert['type'] }}">{{ $alert['message'] }}</x-alert-message>
    @endif
    {{ $slot }}
</main>
{{--<x-footer></x-footer>--}}
@livewireScripts
<script src="{{ mix('js/app.js', 'build') }}"></script>
@stack('scripts')
</body>

