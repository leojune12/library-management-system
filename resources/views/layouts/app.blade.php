<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Registrar') }}@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- Vuetify fonts --}}
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">

        @stack('links')

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
    <body class="tw-font-sans tw-antialiased">
        <div class="tw-min-h-screen tw-bg-gray-100">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            {{-- <header class="tw-bg-white tw-shadow">
                <div class="tw-max-w-7xl tw-mx-auto tw-py-6 tw-px-4 sm:tw-px-6 lg:tw-px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <v-app id="app">
                @include('layouts.app_bar')

                <v-main>
                    @include('layouts.navigation_drawer')
                    <v-container class="py-12">
                        {{ $slot }}
                    </v-container>
                </v-main>
            </v-app>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
