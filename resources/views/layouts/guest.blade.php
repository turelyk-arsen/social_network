<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <style>
        #hide {
            display: none;
        }
    </style>
</head>

<body>

    {{-- load --}}
    <div id="loading">
        <x-flash-blue />
        <div class=" h-screen w-screen flex items-center justify-center bg-gray-100">
            <div class="text-lg text-gray-700">
                <svg fill="none" class="w-10 h-10 animate-spin" viewBox="0 0 32 32"
                    xmlns="http://www.w3.org/2000/svg">
                    <path class="text-blue-500" clip-rule="evenodd"
                        d="M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z"
                        fill="currentColor" fill-rule="evenodd" />
                </svg>
                <div>Loading ...</div>
            </div>
        </div>
    </div>
    {{-- end --}}
    <div id="hide" class="font-sans text-gray-900 antialiased">
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        <x-footer />
    </div>
    <script>
        setTimeout(function() {
            var element = document.getElementById('loading');
            element.style.display = 'none';
            var elementAll = document.getElementById('hide');
            elementAll.style.display = 'block';
        }, 2000);
    </script>
</body>

</html>
