<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            .nav-link.active {
                background-color: #E5E7EB !important;
            }

            .v-application--wrap {
               min-height: unset !important;
            }

            button {
                outline: none !important;
            }
        </style>
    </head>
    <body>
        <div class="tw-font-sans tw-text-gray-900 tw-antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
