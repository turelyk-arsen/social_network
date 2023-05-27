<?php
use App\Models\User;
?>
@props(['postAll'])

@if (Auth::user()->role == 'moderator')
    {{-- Card of all POSTS --}}
    <section style="margin:auto;"
        class="px-16  bg-white tails-selected-element bg-gradient-to-r from-bg-white justify-center">
                    <h2 style="font-family: 'Comfortaa', cursive;"
            class="relative max-w-lg mt-8 mb-10 text-4xl font-semibold leading-tight lg:text-5xl uppercase ml-40">
            All posts </h2>
            <div class=" grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">

            @foreach ($postAll as $post)
                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="/posts/{{ $post->id }}" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                            src="{{ asset('storage/' . $post->image) }}">
                    </a>
                    <x-tags-posts :tagsS="$post->tags" />

                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl line-clamp-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-500 line-clamp-5">{{ $post->content }}</p>
                    <form action="/posts/{{ $post->id }}/delete/delete" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete
                            POST</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div style="width: 60%; margin:auto" class="mt-6 p-4">
            {{ $postAll->links() }}
        </div>
    </section>
@endif
