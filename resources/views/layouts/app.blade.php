<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @livewireStyles
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    {{-- <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
</head>
<body>
    <div id="app">
      

        <section class="px-8 py-6 mb-6">
            <header class="container mx-auto">
                <h1><img src="{{ asset('image/twitter-logo.svg') }}" alt="tweety"></h1>
            </header>
        </section>

        <section class="px-4">
            <main class="container mx-auto">
                <div class="lg:flex">
                    <div class="lg:w-1/12">
                        @include('_sidebar-links')
                    </div>
                
                   @yield('content')
                
                    <div class="lg:w-2/12">
                        @include('_friends-list')
                    </div>
                </div>
            </main>
        </section>
    </div>

    @livewireScripts
</body>
</html>
