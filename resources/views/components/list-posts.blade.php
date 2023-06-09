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
                        <img src="{{ asset($post->image) }}" alt=""
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

                        <form action="/moderator/{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="text-red-500"> <i class="fa-solid fa-trash"></i>Delete </button> --}}
                             <x-danger-button>{{ __('Delete post') }}</x-danger-button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>