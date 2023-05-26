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
    {{-- <div class="py-10 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>Hello {{ Auth::user()->name }} !</div>
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between gap-x-6 py-5">
                        <div class="flex gap-x-4">
                            <img class="h-24 w-24 flex-none rounded-full bg-gray-50"
                                src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/No_image_available.svg.png') }}"
                                alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ Auth::user()->email }}</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">{{ Auth::user()->created_at }}</p>

                            </div>
                        </div>
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900"> {{ Auth::user()->about }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <x-user-profile class="bg-white" />

    <div style="position: relative; top: -280px; left: 16.4%" class="text-gray-400">
        @if ($hasNewMessages)
            <div style="font-family: 'Comfortaa', cursive;" class="new-messages ">
                <p>You have {{ $newMessagesCount }} new messages in the chat.</p>
            </div>
        @endif
    </div>

    {{-- @if ($hasNewMessages)
        <div class="new-messages">
            <p>You have {{ $newMessagesCount }} new messages in the chat.</p>
        </div>
    @endif --}}
    {{-- <p>У вас {{ $newMessagesCount }} нових повідомлень.</p> --}}

    {{-- Admin delete user --}}
    {{-- @if (Auth::user()->name == 'admin')

            <section class="py-20 bg-white tails-selected-element bg-[url('/images/735277.jpg')] bg-cover">
                <div class="container max-w-6xl mx-auto">
                    <h2 class="text-4xl font-bold tracking-tight text-center">List of all users</h2>
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach (User::all() as $user)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/No_image_available.svg.png') }}"
                                        alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $user->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="hidden sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-gray-900">Info about user : {{ $user->about }}
                                    </p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500">User account created at
                                        {{ $user->created_at }}</p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500">User account updated at
                                        {{ $user->updated_at }}</p>
                                </div>

                                <section class="space-y-6">
                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion-{{ $user->id }}')">
                                        {{ __('Delete Account') }}</x-danger-button>

                                    <x-modal :name="'confirm-user-deletion-' . $user->id" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                        <form method="post" action="{{ route('profile.deleteUser', $user->id) }}"
                                            class="p-6">
                                            @csrf
                                            @method('delete')

                                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                {{ __('Are you sure you want to delete your account?') }}
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                            </p>

                                            <div class="mt-6">
                                                <x-input-label for="password" value="{{ __('Password') }}"
                                                    class="sr-only" />

                                                <x-text-input id="password" name="password" type="password"
                                                    class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

                                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                            </div>

                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Cancel') }}
                                                </x-secondary-button>

                                                <x-danger-button class="ml-3">
                                                    {{ __('Delete Account') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                </section>

                            </li>
                        @endforeach

                    </ul>
                </div>
            </section>
        @endif --}}
    <x-admin-delete />

    {{-- list of post ---- user --}}

    {{-- @yield('joke') --}}
    <section style="margin:auto; "
        class="  px-16  bg-white tails-selected-element bg-gradient-to-r from-bg-white justify-center">
        <div style="margin:auto;" class="container max-9-xl mx-auto justify-center  ">

            <p style="color:  #8c84ff;" class="ml-40 mt-40 font-medium tracking-wide text-gray-400 uppercase">Open the
                post to
                see it in details </p>
            <h2 style="font-family: 'Comfortaa', cursive;"
                class="relative max-w-lg mt-8 mb-10 text-4xl font-semibold leading-tight lg:text-5xl uppercase ml-40">
                My
                posts
            </h2>

            <div style="margin:auto; padding-left: 8%"
                class="grid grid-cols-3 gap-8 mt-10 sm:grid-cols-10 lg:grid-cols-10 sm:px-0 xl:px-0 justify-center">
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
            <div style=" color: rgb(74, 52, 140);  "
                class="py-20 rounded-xl  mix-blend-normal  px-15 w-2/3 m-auto  flex flex-col items-end mt-4 mr-8 ">
                <x-joke :joke=$joke />
            </div>
        </div>
        <section class="relative  overflow-hidden ">


            <span
                class="container hidden w-screen h-32 max-w-xs  transform rounded-full  lg:max-w-lg  bg-blue-50"></span>
            </span>

            <span class="absolute bottom-0 left-0"> </span>

            <div class="relative px-16 mx-auto max-w-7xl">
                <p class="font-medium tracking-wide text-gray-400 uppercase">visit your friends profile</p>
                <h2 style="font-family: 'Comfortaa', cursive;"
                    class="relative max-w-lg mt-5 mb-20 text-4xl font-semibold leading-tight lg:text-5xl uppercase">
                    My
                    friends</h2>
                <div class="shrink-0 grid w-full grid-cols-2 gap-20 sm:grid-cols-3 lg:grid-cols-2 ">
                    @foreach ($users as $user)
                        @if ($user->id !== Auth::user()->id)
                            <div class="flex place-content-between shadow pr-10 rounded-xl">
                                <div class="shrink-0 relative p-5">
                                    <div class="">
                                    </div>
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
                                <div style="width: 60px"></div>
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

    {{-- list of friend --- user --}}

</x-app-layout>
