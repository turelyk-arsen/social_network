<x-app-layout :newMessagesCount="$newMessagesCount">
    <x-slot name="header" class="bg-white">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your profile') }}
        </h2>
    </x-slot>

    {{-- Pop up   "You're logged in!" --}}

    {{-- <div class="py-12" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    {{-- @if (session('registration_success') && !session('registration_success_shown'))    @endif --}}
    <div class="px-8 py-6 bg-green-400 text-white flex justify-between rounded" x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
            </svg>
            <p>Success! {{ __("You're logged in!") }}</p>
        </div>
        <button class="text-green-100 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>


    {{-- User profile --}}
    <x-user-profile class="bg-white" />

    {{-- <div style="position: relative; top: -280px; left: 16.4%" class="text-gray-400">
        @if ($hasNewMessages)
            <div style="font-family: 'Comfortaa', cursive;" class="new-messages ">
                <p>You have {{ $newMessagesCount }} new messages in the chat.</p>
            </div>
        @endif
    </div> --}}

    {{-- API --}}
    <div style="color: rgb(74, 52, 140); "
        class="rounded-xl mix-blend-normal w-2/3 m-auto flex flex-col items-end mr-8 ">
        <x-joke :joke=$joke />
    </div>

    {{-- Admin --}}
    <x-admin-delete />

    {{-- Moderator --}}
    <x-moderator :postAll="$postAll" />

    {{-- list of post ---- user --}}

    <section class="max-w-7xl mx-auto bg-white tails-selected-element bg-gradient-to-r from-bg-white justify-center">
        <div class="container max-9-xl mx-auto justify-center">

            <p style="color:  #8c84ff;" class="ml-40 mt-10 font-medium tracking-wide text-gray-400 uppercase">Open the
                post to see it in details </p>
            <h2 style="font-family: 'Comfortaa', cursive;"
                class="relative max-w-lg mt-8 mb-10 text-4xl font-semibold leading-tight lg:text-5xl uppercase ml-40">
                My posts </h2>

            <div class="grid grid-cols-3 gap-8 sm:grid-cols-10 lg:grid-cols-10 sm:px-0 xl:px-0 justify-center">
                @foreach ($posts as $post)
                    <div style="  color: rgb(0, 0, 0);  "
                        class="transition grid-rows-3 relative flex flex-col justify-between col-span-4  xl:col-span-3 hover:col-span-3 rounded px-10 py-8 space-y-2 overflow-hidden backdrop-blur-xl  shadow-black sm:rounded-xl "
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class=" tflex flex-col items-start col-span-3 space-y-3 sm:col-span-3 xl:col-span-3">

                            <x-tags :tagsS="$post->tags" />

                            <a href="/posts/{{ $post->id }}" class="block">
                                <img style="margin-right:10px"
                                    class="rounded object-cover w-full  mb-6  overflow-hidden  shadow-sm grayscale hover:grayscale-0"
                                    src="{{ asset('storage/' . $post->image) }}">
                            </a>

                            <h2 style="font-family: 'Comfortaa', cursive; font-size: 22px"
                                class=" uppercase  font-bold   line-clamp-3">
                                {{ $post->title }}</h2>
                            <p class=" text-justify border-l-2 border-gray-500 px-5 text-sm text-gray-500 line-clamp-5">
                                {{ $post->content }}</p>
                        </div>

                        <div class=" justify-end py-2 hover:underline ">
                            <a href="/posts/{{ $post->id }}" class="block">
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
        </div>

        {{-- all users --}}
        <section class="relative overflow-hidden ">
            <div class="relative px-10 mx-auto max-w-7xl">
                <p class="font-medium tracking-wide text-gray-400 uppercase">visit your friends profile</p>
                <h2 style="font-family: 'Comfortaa', cursive;"
                class="relative max-w-lg mt-8 mb-10 text-4xl font-semibold leading-tight lg:text-5xl uppercase ml-40">
                My friends </h2>
                <div class="shrink-0 grid w-full grid-cols-2 gap-20 sm:grid-cols-3 lg:grid-cols-2 ">
                    @foreach ($users as $user)
                        @if ($user->id !== Auth::user()->id)
                            <div class="flex place-content-between shadow pr-10 rounded-xl">
                                <div class="shrink-0 relative p-5">
                                    <img class="ml-2 transition relative z-20 w-20 rounded-full"
                                        src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/No_image_available.svg.png') }}">
                                </div>
                                <div class="shrink-0 relative p-5">
                                    <div class=" shrink-0 mt-3 space-y-2 text-center">
                                        <div class="space-y-1 text-lg   leading-6">
                                            <h3 class="uppercase font-medium">{{ $user->name }}</h3>
                                            <p class="text-blue-600">{{ $user->role }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="shrink-0 relative flex items-center justify-end">
                                    <button type="button"
                                        class="uppercase text-gray-600 hover:text-white hover:bg-indigo-400 hover:border-0 text-xl  rounded-lg bg-transparent  inline-block mt-0 ml-4 py-1.5 px-4 cursor-pointer">
                                        <a href="/chat/{{ $user->id }}"
                                            class="text-black-300 hover:text-gray-100 ">
                                            Chat</a></button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </section>


</x-app-layout>
