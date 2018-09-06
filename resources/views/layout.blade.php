<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body class="bg-blue-lightest font-sans">
    <header class="bg-white shadow">
        <div class="h-12 container mx-auto flex items-center">
            <div class="w-1/3 flex items-center justify-center">
                <a href="/forum" class="mr-6 text-blue-darker no-underline font-bold text-xs flex items-center">
                    <svg class="mr-2 fill-current text-blue-darker inline-block h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z"/></svg>
                    Accueil
                </a>
                @if(auth()->check())
                    <a href="/threads?by={{ auth()->user()->name }}" class="mr-6 text-blue-darker no-underline font-bold text-xs flex items-center">
                        Mes sujets
                    </a>
                @endif
                @if(auth()->check() && auth()->user()->role === 1)
                    <a href="/channel/action/create" class="mr-6 text-blue-darker no-underline font-bold text-xs flex items-center">
                        Nouvelle catégorie
                    </a>
                @endif
            </div>
            <a href="/" class="w-1/3 flex items-center justify-center">
                <img src="#" alt="logo">
            </a>
            <div class="w-1/3 flex items-center">
                <form method="get" action="/search">
                    @csrf
                    <div class="flex items-center mr-2 w-64 px-3 mr-8 rounded border border-blue-lighter bg-blue-lighter py-2">
                        <input name="search" type="text" class="px-2 bg-blue-lighter text-blue-darker text-xs w-full font-medium" placeHolder="Rechercher...">
                    <button type="submit" class="relative text-blue-darker">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                    </button>
                </form>
            </div>
            <div class="w-2/3 flex items-center">
            @if (auth()->check())
                <div class="mr-2 h-10 w-10">
                    @if( isset(auth()->user()->avatar))
                        <a href="/dashboard" class="sm:h-24">
                            <img class=" rounded-full" src="/storage/{{ auth()->user()->avatar }}" alt="avatar">
                        </a>
                        @else
                        <a href="/dashboard" class="sm:h-24">
                            <svg class="bg-blue-light rounded-full fill-current text-blue-darker" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
                        </a>
                    @endif
                </div>
            @else
                <a href="/login" class="py-2 hover:text-blue-light text-blue-darkest text-center text-xs px-2 no-underline leading-none rounded">
                    Se connecter
                </a>
                <a href="/registration" class="bg-blue py-2 hover:bg-blue-dark text-white text-center text-xs px-2 no-underline leading-none rounded mr-2">
                    S'inscrire
                </a>
            @endif
            </div>
        </div>
    </header>

    <div class="container mx-auto">
        @include('flash::message')

        @yield('content')
    </div>

    <script src="{{ mix('js/personalize.js') }}"></script>
</body>
</html>