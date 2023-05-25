<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search a topic or choose one of the articles below') }}
        </h2>
        <x-search />

    </x-slot>

    <x-flash />

    <section class="bg-white tails-selected-element" contenteditable="false">
        <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">

            <div class="flex flex-col items-center sm:px-5 md:flex-row">
                <div class="w-full md:w-1/2">
                    <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                        src="https://cdn.devdojo.com/images/may2021/cupcakes.jpg">
                </div>
                <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                    <div
                        class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
                        <div
                            class="bg-pink-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                            <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span>Featured</span>
                        </div>
                        <h1 style="font-family: 'Comfortaa', cursive;"
                            class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl">Read topics. Follow
                            authors.</h1>
                        {{-- button add post --}}
                        <form action="/posts/create" method="get">
                            <div class="mt-10 flex justify-end gap-x-6">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ADD
                                    NEW POST</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Card of all POSTS --}}
            <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">
                @foreach ($posts as $post)
                    <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                        <a href="/posts/{{ $post->id }}" class="block">
                            <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                                src="{{ asset('storage/' . $post->image) }}">
                        </a>
                        <x-tags-posts :tagsS="$post->tags" />

                        <h2 class="text-lg font-bold sm:text-xl md:text-2xl line-clamp-2">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-500 line-clamp-5">{{ $post->content }}</p>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <div class="bg-slate-50 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">All posts</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.
                </p>
                <form action="/posts/create" method="get">
                    <div class="-mt-10 flex justify-end gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                            POST</button>
                    </div>
                </form>
            </div>

            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at }}</time>
                            <a href="/posts/{{ $post->id }}"
                                class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->subtitle }}
                            </a>
                        </div>
                        <div class="">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="/posts/{{ $post->id }}">
                                <span class="absolute inset-0"></span>
                                {{ $post->title }}</a>

                            </h3>
                            <x-tags :tagsS="$post->tags" />


                            <a href="/posts/{{ $post->id }}"><img src="{{ asset('storage/'.$post->image) }}"
                                    class="list-image-none rounded-lg shadow-lg shadow-gray-900/50 object-cover object-center"></a>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->content }}</p>

                        </div>

                        <div class="relative mt-8 flex items-center gap-x-4">
                            <img src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : asset('images/No_image_available.svg.png') }}"
                                class="h-10 w-10 rounded-full bg-gray-50">
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900">
                                    <a href="/posts/{{ $post->id }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->user->name }}
                                    </a>
                                </p>
                                <p class="text-gray-600">{{ $post->user->role }} </p>
                            </div>

                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div> --}}
    <div style="width: 60%; margin:auto" class="mt-6 p-4">
        {{ $posts->links() }}
    </div>
</x-app-layout>
