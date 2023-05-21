<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
        {{-- <x-search /> --}}

    </x-slot>
    <x-flash />

    <div class="bg-slate-50 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">One post</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.
                </p>

                {{-- @if (Auth::user()->id == $post->user_id || Auth::user()->name == 'moderator')
                    <div class="-mt-10 flex justify-end gap-x-6">
                        <form action="/posts/{{ $post->id }}/edit" method="get">
                            @csrf
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit
                                POST</button>
                        </form>
                        <form action="/posts/{{ $post->id }}/delete" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete
                                POST</button>
                        </form>


                    </div>
                @endif
                <form action="/posts/{{ $post->id }}/comment" method="get">
                    @csrf
                    <button type="submit"
                        class="rounded-md bg-indigo-600 mt-10 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                        Comment</button>
                </form> --}}
            </div>

            {{-- <div
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

                        <img src="{{ asset('storage/' . $post->image) }}" alt=""
                            class="list-image-none rounded-lg shadow-lg shadow-gray-900/50 object-cover object-center">
                        <p class="mt-5 text-xl leading-6 text-gray-800">{{ $post->content }}</p>
                    </div>
                </article>
            </div> --}}

            {{-- <ul role="list" class="divide-y divide-gray-100">
                <h3 class="mt-3 text-3xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    Comments
                </h3>
                @foreach ($comments as $comment)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                src="{{ $comment->user->photo ? asset('storage/' . $comment->user->photo) : asset('images/No_image_available.svg.png') }}"
                                alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ $comment->user->name }}</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $comment->user->email }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-lg leading-6 text-gray-900">{{ $comment->content }}</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">Created at <time
                                    datetime="2023-01-23T13:23Z">{{ $comment->created_at }}</time></p>
                        </div>

                        @if (Auth::user()->id == $post->user_id || Auth::user()->name == 'moderator')
                            <div class="mt-1 flex justify-end gap-x-6">
                                <form action="{{ route('comments.edit', $comment->id) }}" method="get">
                                    @csrf
                                    <button type="submit"
                                        class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit
                                    </button>
                                </form>
                                <form action=" {{ route('comments.destroy', $comment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul> --}}
        </div>
    </div>

    {{-- New article --}}
    <div class="max-w-screen-xl mx-auto">

        <main class="mt-10">

            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10"
                    style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="{{ asset('storage/' . $post->image) }}"
                    class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-20">
                    @php
                        $tags = explode(', ', $post->tags);
                    @endphp
                    @foreach ($tags as $tag)
                        {{-- <li
                class="inline-flex items-center justify-center px-4 py-2 my-3 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none tails-selected-element"> </li> --}}
                        <a href="/posts/?tag={{ $tag }}"
                            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $tag }}</a>
                    @endforeach
                    {{-- <a href="#"
            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">Nutrition</a> --}}
                    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">{{ $post->title }}
                    </h2>
                    <div class="flex mt-3">
                        <img src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : asset('images/No_image_available.svg.png') }}"
                            class="h-10 w-10 rounded-full mr-2 object-cover" />
                        <div>
                            <p class="font-semibold text-gray-200 text-sm"> {{ $post->user->name }} </p>
                            <p class="font-semibold text-gray-400 text-xs"> {{ $post->created_at }} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 lg:px-0 mt-12 text-gray-700 pb-6 max-w-screen-md mx-auto text-lg leading-relaxed">
                {{-- <p class="pb-6">{{ $post->content }}</p> --}}

                <div class="border-l-4 border-gray-500 pl-4 mb-6 italic rounded">
                    {{ $post->content }}
                </div>
                {{-- <h2 class="text-2xl text-gray-800 font-semibold mb-4 mt-4">Uneasy barton seeing remark happen his has</h2> --}}

            </div>
        </main>
        <!-- main ends here -->

    </div>

    <section
        class="relative flex items-center justify-center py-10 antialiased  bg-slate-50 min-w-screen">
        <div class="container px-0 mx-auto sm:px-5">

            {{-- <div
            class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
            <div class="flex flex-row">
                <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="Noob master's avatar"
                    src="https://images.unsplash.com/photo-1517070208541-6ddc4d3efbcb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
                <div class="flex-col mt-1">
                    <div class="flex items-center flex-1 px-4 font-bold leading-tight">Noob master
                        <span class="ml-2 text-xs font-normal text-gray-500">2 weeks ago</span>
                    </div>
                    <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">Wow!!! how you did you
                        create this?
                    </div>
                    <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
                        <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900"
                            viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z"
                                fill-rule="nonzero" />
                        </svg>
                    </button>
                    <button class="inline-flex items-center px-1 -ml-1 flex-column">
                        <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <hr class="my-2 ml-16 border-gray-200">
            <div class="flex flex-row pt-1 md-10 md:ml-16">
                <img class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="Emily's avatar"
                    src="https://images.unsplash.com/photo-1581624657276-5807462d0a3a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
                <div class="flex-col mt-1">
                    <div class="flex items-center flex-1 px-4 font-bold leading-tight">Emily
                        <span class="ml-2 text-xs font-normal text-gray-500">5 days ago</span>
                    </div>
                    <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">I created it using
                        TailwindCSS
                    </div>
                    <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
                        <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900"
                            viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z"
                                fill-rule="nonzero" />
                        </svg>
                    </button>
                    <button class="inline-flex items-center px-1 -ml-1 flex-column">
                        <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div> --}}
            <h3 class="mt-3 text-3xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                Comments
            </h3>
            @if (Auth::user()->id == $post->user_id || Auth::user()->name == 'moderator')
                <div class="-mt-10 flex justify-end gap-x-6">
                    <form action="/posts/{{ $post->id }}/edit" method="get">
                        @csrf
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit
                            POST</button>
                    </form>
                    <form action="/posts/{{ $post->id }}/delete" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete
                            POST</button>
                    </form>


                </div>
            @endif

            @foreach ($comments as $comment)
                <div
                    class="flex-col w-full py-4 mx-auto mt-3 bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
                    <div class="flex flex-row md-10">
                        <img class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="avatar"
                            src="{{ $comment->user->photo ? asset('storage/' . $comment->user->photo) : asset('images/No_image_available.svg.png') }}">
                        <div class="flex-col mt-1">
                            <div class="flex items-center flex-1 px-4 font-bold leading-tight">
                                {{ $comment->user->name }}
                                <span class="ml-2 text-xs font-normal text-gray-500">{{ $comment->created_at }}</span>
                            </div>
                            <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">
                                {{ $comment->content }}
                            </div>
                            <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
                                <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900"
                                    viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z"
                                        fill-rule="nonzero" />
                                </svg>
                            </button>
                            <button class="inline-flex items-center px-1 -ml-1 flex-column">
                                <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->id == $post->user_id || Auth::user()->name == 'moderator')
                    <div class="mt-1 flex justify-end gap-x-6">
                        <form action="{{ route('comments.edit', $comment->id) }}" method="get">
                            @csrf
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit
                            </button>
                        </form>
                        <form action=" {{ route('comments.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-md bg-red-600 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete
                            </button>
                        </form>
                    </div>
                @endif
            @endforeach

            <form action="/posts/{{ $post->id }}/comment" method="get">
                @csrf
                <button type="submit"
                    class="rounded-md bg-indigo-600 mt-10 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                    Comment</button>
            </form>
        </div>
    </section>

</x-app-layout>
