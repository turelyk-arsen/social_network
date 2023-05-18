<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
        <x-search />

    </x-slot>

    <div class="bg-slate-50 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">All posts</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.
                </p>

                <div class="-mt-10 flex justify-end gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                        POST</button>
                </div>
            </div>

            <div
                class="mx-auto  mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none md:grid-cols-1 lg:grid-cols-1">
                <article class="flex max-w-full flex-col items-start justify-between">
                    <div class="flex align-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at }}</time>
                        <a href="/posts/{{ $post->id }}"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->subtitle }}</a>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-3xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
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

                        <div class="relative mb-8 flex items-center gap-x-4">
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

                        <img src="{{ asset($post->image) }}" alt=""
                            class="list-image-none rounded-lg shadow-lg shadow-gray-900/50 object-cover object-center">
                        <p class="mt-5 text-xl leading-6 text-gray-800">{{ $post->content }}</p>
                    </div>
                </article>
            </div>
        </div>
    </div>

</x-app-layout>