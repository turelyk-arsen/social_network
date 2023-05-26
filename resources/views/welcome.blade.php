<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
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
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body class="antialiased">


    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-sky-50 bg-[url('/images/bg-w.jpg')] bg-cover dark:bg-dots-lighter dark:bg-gray-500 selection:bg-red-500 selection:text-white">

        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    @if (auth()->user()->role === 'moderator')
                        <a href="{{ url('/moderator') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 uppercase focus:rounded-sm focus:outline-red-500">Moderator's
                            profile</a>
                    @else
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 uppercase focus:rounded-sm focus:outline-red-500">My
                            profile</a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        {{-- first view --}}
        <div class="max-w-7xl mx-auto p-6 lg:p-8 ">
            <img class=" w-30 h-30 " src="{{ asset('images/logo_v2_pu.svg') }}" alt="">

            <div
                class="container max-w-lg px-4 py-32 mx-auto mt-px text-left md:max-w-none md:text-center tails-selected-element">
                <h1
                    class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl">
                    <span style="font-family: 'Comfortaa', cursive;" class="inline md:block">Start Chatting</span> <span
                        style="font-size: 40px; font-weight: 300"
                        class=" uppercase relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-indigo-500 md:inline-block">To
                        tell your next
                        Great Ideas</span>
                </h1>
                <div class="mx-auto mt-2 text-gray-500 md:mt-12 md:max-w-lg md:text-center lg:text-lg">Simplifying the
                    creation of landing pages, blog pages, application pages and so much more!</div>
                <div class="flex flex-col items-center mt-6 text-center">
                    <span class="relative inline-flex w-full md:w-auto">
                        <a href="{{ route('register') }}" type="button"
                            class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-bold leading-6 text-white bg-indigo-600 border border-transparent rounded-full md:w-auto hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400">
                            Join Us
                        </a>
                        <span
                            class="absolute top-0 right-0 -px-4 -py-1 mt-10 -mr-12 text-xs font-medium leading-tight text-gray-600 bg-transparent rounded-full">for
                            free</span>
                    </span>
                </div>
                <div class="mx-auto mt-12 text-gray-500 md:mt-20 md:max-w-lg md:text-center lg:text-lg  "><a
                        href="#posts">
                        Or get a look on
                        latest posts <br> <svg xmlns="http://www.w3.org/2000/svg"
                            style="margin-left: 49%; margin-top: 15px" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="place-items-center w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                        </svg> </a>
                </div>
            </div>
        </div>
    </div>

    {{-- rose [#fbc9f8] --}}
    {{-- post last 3 --}}

    <div id="posts" class=" ">
        <div style="margin-left: 25%" class=" mx-auto max-w-7xl px-6 lg:px-24">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 style="font-family: 'Comfortaa', cursive;"
                    class=" text-3xl font-bold tracking-tight text-gray-900
                    sm:text-4xl">Sneak peek
                    on our newest
                    posts
                </h2>
                <p style="margin-left: -60px" class="text-center mt-4  text-lg leading-8 text-gray-600">Register or
                    Login in
                    your account to
                    discover it all.
                </p>
            </div>

            {{-- <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at }}</time>
                            <a href="#"
                                class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->subtitle }}</a>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>

                            @php
                                $tags = explode(', ', $post->tags);
                            @endphp
                            @foreach ($tags as $tag)
                                <li
                                    class="inline-flex items-center justify-center px-4 py-2 my-3 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none tails-selected-element">
                                    <a href="/?tag={{ $tag }}">{{ $tag }}</a>
                                </li>
                            @endforeach
                            <img src="{{ asset('storage/'.$post->image) }}" alt=""
                                class="list-image-none rounded-lg shadow-lg shadow-gray-900/50 object-cover object-center">
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->content }}</p>
                        </div>

                        <div class="relative mt-8 flex items-center gap-x-4">
                            <img src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : asset('images/No_image_available.svg.png') }}"
                                class="h-10 w-10 rounded-full bg-gray-50">
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->user->name }}
                                    </a>
                                </p>
                                <p class="text-gray-600">{{ $post->user->role }} </p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div> --}}
        </div>
    </div>


    <div class="grid grid-cols-3 gap-10 mt-10 sm:grid-cols-10 mx-auto lg:grid-cols-10 sm:px-0 xl:px-32 justify-center">
        {{-- @foreach ($posts as $post)
            <div
                class="max-w-xs container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <div>
                    <span class="text-white text-xs font-bold rounded-lg bg-green-500 inline-block mt-4 ml-4 py-1.5 px-4 cursor-pointer">Home</span>
                    <x-tags :tagsS="$post->tags" />
                    <h1
                        class="text-2xl mt-2 ml-4 line-clamp-1 font-bold text-gray-800 cursor-pointer hover:text-gray-900 transition duration-100">
                        {{ $post->title }}</h1>
                    <p class="ml-4 mt-1 mb-2 text-gray-700 line-clamp-2 hover:underline cursor-pointer">
                        {{ $post->content }}</p>
                </div>
                <img class="w-full cursor-pointer" src="{{ asset('storage/' . $post->image) }}" alt="" />
                <div class="flex p-4 justify-between">
                    <div class="flex items-center space-x-2">
                        <img class="w-10 rounded-full"
                            src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : asset('images/No_image_available.svg.png') }}"
                            alt="sara" />
                        <h2 class="text-gray-800 font-bold cursor-pointer">{{ $post->user->name }}</h2>
                    </div>
                    <div class="flex space-x-2">
                        <div class="flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-600 cursor-pointer"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </span>
                            <span>22</span>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7 text-red-500 hover:text-red-400 transition duration-100 cursor-pointer"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span>20</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}
        @foreach ($posts as $post)
            {{-- <div class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 sm:rounded-xl"
            data-rounded="rounded-xl" data-rounded-max="rounded-full">
            <div class="p-3 text-white bg-blue-500 rounded-full" data-primary="blue-500"
                data-rounded="rounded-full">
            </div>

            <a href="/posts/{{ $post->id }}" class="block">
                <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 grayscale hover:grayscale-0"
                    src="{{ asset('storage/' . $post->image) }}">
            </a>
            <x-tags-posts :tagsS="$post->tags" />

            <h2 class="text-lg font-bold sm:text-xl md:text-2xl line-clamp-2">{{ $post->title }}</h2>
            <p class="text-sm text-gray-500 line-clamp-5">{{ $post->content }}</p>

        </div> --}}

            <div style="  color: rgb(0, 0, 0);  "
                class="transition grid-rows-3 relative flex flex-col justify-between col-span-4  xl:col-span-3 hover:col-span-3 rounded px-10 py-8 space-y-2 overflow-hidden backdrop-blur-xl  shadow-black sm:rounded-xl "
                data-rounded="rounded-xl" data-rounded-max="rounded-full">
                <div class=" tflex flex-col items-start col-span-3 space-y-3 sm:col-span-3 xl:col-span-3">

                    <x-tags :tagsS="$post->tags" />

                    {{-- <a href="/posts/{{ $post->id }}" class="block"> --}}
                    <img style="margin-right:10px"
                        class="rounded object-cover w-full  mb-6  overflow-hidden  shadow-sm grayscale hover:grayscale-0"
                        src="{{ asset('storage/' . $post->image) }}">
                    {{-- </a> --}}
                    <div class="flex p-4 justify-between">
                        <div class="flex items-center space-x-2">
                            <img class="w-10 rounded-full"
                                src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : asset('images/No_image_available.svg.png') }}"
                                alt="sara" />
                            <h2 class="text-gray-800 font-bold cursor-pointer">{{ $post->user->name }}</h2>
                        </div>
                        <div class="flex space-x-2">
                            <div class="flex space-x-1 items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-600 cursor-pointer"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </span>
                                <span>22</span>
                            </div>
                            <div class="flex space-x-1 items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-7 w-7 text-red-500 hover:text-red-400 transition duration-100 cursor-pointer"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span>20</span>
                            </div>
                        </div>
                    </div>

                    <h2 style="font-family: 'Comfortaa', cursive; font-size: 22px"
                        class=" uppercase  font-bold   line-clamp-3">
                        {{ $post->title }}</h2>
                    <p class=" text-justify border-l-2 border-gray-500 px-5 text-sm text-gray-500 line-clamp-5">
                        {{ $post->content }}</p>



                </div>
                <div class=" justify-end py-2 hover:underline ">
                    <a href="/register" class="block">
                        <p style="width:100%;  font-family: 'Comfortaa' ,
                   cursive; font-size: 12px; text-align: right"
                            class="  relative px-8  uppercase font-bold  ">READ MORE
                            <svg style="top: 0px; right:10" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class=" absolute w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>

                        </p>
                    </a>

                </div>

            </div>
        @endforeach
    </div>

    <x-footer />
</body>

</html>
