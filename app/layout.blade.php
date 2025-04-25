<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdéCoif - Institut de Beauté à Abomey-Calavi</title>
    <meta name="description" content="AdéCoif est un institut de beauté de premier plan situé à Abomey-Calavi, offrant une gamme complète de services de coiffure et de beauté pour hommes et femmes.">
    <meta name="generator" content="v0.dev">

    {{-- Google Fonts: Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    {{-- Tailwind CSS & Custom Global Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-[Inter] text-gray-900 bg-white dark:bg-gray-950 dark:text-white">

    {{-- Système de thème (optionnel) --}}
    {{-- @include('components.theme-switcher') --}}

    {{-- Header --}}
    @include('components.header')

    {{-- Contenu principal --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

</body>
</html>

