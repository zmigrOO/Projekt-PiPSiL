<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('meta::manager', [
    'title'         => 'Available offers - Shop Now!',
    'description'   => 'Find the best deals and discounts on a wide range of products at our online store. Shop now and get great savings on electronics, fashion, home goods, and more. Fast and reliable shipping available. Shop now and start saving!',
    'author'        => 'Patryk Żmigrodzki, Aleksandra Kozubal, Natalia Wieczorek',
    'keywords'      => 'offers, discounts, deals, electronics, fashion, home goods',
    'geo_region'    => 'PL',
])
</head>

<body class="font-sans w-full antialiased relative dark:bg-grey-900">
<div>
    <div
        class="z-10 mx-auto px-4 abs sm:px-6 top-0 left-0 fixed w-full lg:px-8 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 z-20 flex items-center">
                    <a href="{{ route('offers') }}">
                        <x-application-logo
                            class="block h-9 w-auto z-30 fill-current text-teal-500 dark:text-gray-200"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                </div>
            </div>


            <!-- Hamburger -->
        </div>
    </div>
        <div class="min-h-screen bg-gray-100 abs dark:bg-gray-900 fix">
            @if (Route::has('login'))
                <div class="fixed top-0 z-20 right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('home') }}</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('login') }}
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

        <!-- Responsive Text Input and Submit Button -->
        @if(Route::currentRouteName() == 'offers')
            <form action="/search" method="get"
                  class="p-4 text-center z-0 sm:z-20 relative sm:fixed top-16 sm:top-0 -translate-x-1/2 w-full sm:w-auto"
                  style="left: 50%">
                <div class="flex-none float-left w-fit">
                    <x-text-input id="search" class="sm:w-80 h-10" type="text" name="search" autofocus


                        placeholder="{{ __('Search') }}" />
                </div>
                <div class="flex-none float-right">
                    <x-primary-button class="h-10 ml-2">
                        {{ __('Search') }}
                    </x-primary-button>
                </div>
            </form>
        @endif

        <!-- Page Content -->
        <main class="mt-16 sm:mt-16">
            {{ $slot }}
        </main>
    </div>
</div>
</body>

</html>
