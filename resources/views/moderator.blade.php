<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Pop up   "You're logged in!" --}}

    <div class="py-12" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
     <x-flash/>
    {{-- User profile --}}
    <x-user-profile />

    {{-- Moderator delete posts --}}
    {{-- <x-moderator-delete /> --}}


    {{-- list of post ---- user --}}
    {{-- <section class="py-20 bg-white tails-selected-element bg-[url('/images/16150556.jpg')] bg-cover">
        <div class="container max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold tracking-tight text-center">My posts</h2>
            <p class="mt-2 text-lg text-center text-gray-600">Check out my list of awesome posts below.</p>
            @foreach ($posts as $post)
                <div class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0">
                    <div class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class="p-3 text-white bg-blue-500 rounded-full" data-primary="blue-500"
                            data-rounded="rounded-full">
                        </div>
                        <h4 class="text-xl font-medium text-gray-700">{{ $post->title }}</h4>
                        <p class="text-base text-center text-gray-500">{{ $post->content }}</p>
                        <img src="{{ asset($post->image) }}" alt="Post Image">
                    </div>
                </div>
            @endforeach
        </div>
    </section> --}}


    <div class="bg-slate-50 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">From the newest posts</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.
                </p>
            </div>

            <div
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
                               
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                
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
                                        <span class="absolute inset-0"></span>
                                        {{ $post->user->name }}
                                </p>
                                <p class="text-gray-600">{{ $post->user->role }} </p>
                            </div>

                            {{-- <form action="/moderator/{{ $post->id }}/delete" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                class="rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete
                                POST</button>
                            </form> --}}
                           {{-- <x-danger-button>{{ __('Delete post '.$post->id) }}</x-danger-button> --}}

                            {{-- <form action="/posts/{{ $post->id }}/delete" method="post">
                                @csrf
                                @method('DELETE')
        
                                <button type="submit"
                                    class="rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete
                                    POST</button>
                            </form> --}}
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
                                {{-- <button type="submit" class="text-red-500"> <i class="fa-solid fa-trash"></i>Delete </button> --}}

</x-app-layout>
