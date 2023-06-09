<x-app-layout :newMessagesCount="$newMessagesCount">
    <x-slot name="header">
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
    <x-user-profile />

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
    <section class="py-20 bg-white tails-selected-element bg-[url('/images/16150556.jpg')] bg-cover">
        <div class="container max-9-xl mx-auto  ">
            <div class="py-10 bg-white rounded-xl  mix-blend-normal shadow-lg px-10 w-2/3 m-auto italic">
                <x-joke :joke=$joke />
            </div>
            <h2 class="text-4xl font-bold tracking-tight text-center py-10 m-auto ">My posts</h2>
            <p class="mt-2 text-lg text-center text-gray-600">Check out my list of awesome posts below.</p>
            <div class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0">
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

                    <div class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                            <a href="/posts/{{ $post->id }}" class="block">
                                <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                                    src="{{ asset('storage/' . $post->image) }}">
                            </a>
                            <x-tags-posts :tagsS="$post->tags" />

                            <h2 class="text-lg font-bold sm:text-xl md:text-2xl line-clamp-2">{{ $post->title }}</h2>
                            <p class="text-sm text-gray-500 line-clamp-5">{{ $post->content }}</p>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- list of friend --- user --}}
    <section class="relative py-20 overflow-hidden bg-white">

        <span class="absolute top-0 right-0 flex flex-col items-end mt-0 -mr-16 opacity-60">
            <span
                class="container hidden w-screen h-32 max-w-xs mt-20 transform rounded-full rounded-r-none md:block md:max-w-xs lg:max-w-lg 2xl:max-w-3xl bg-blue-50"></span>
        </span>

        <span class="absolute bottom-0 left-0"> </span>

        <div class="relative px-16 mx-auto max-w-7xl">
            <p class="font-medium tracking-wide text-blue-500 uppercase">All users are your Future Friends</p>
            <h2 class="relative max-w-lg mt-5 mb-10 text-4xl font-semibold leading-tight lg:text-5xl">An incredible
                friend who you'd send message</h2>
            <div class="grid w-full grid-cols-2 gap-10 sm:grid-cols-3 lg:grid-cols-4">
                @foreach ($users as $user)
                    @if ($user->id !== Auth::user()->id)
                        <div class="flex flex-col items-center justify-center col-span-1">
                            <div class="relative p-5">
                                <div
                                    class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-blue-50">
                                </div>
                                <img class="relative z-20 w-full rounded-full"
                                    src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/No_image_available.svg.png') }}">
                            </div>
                            <div class="mt-3 space-y-2 text-center">
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3>{{ $user->name }}</h3>
                                    <p class="text-blue-600">{{ $user->role }}</p>
                                </div>
                                <div class="relative flex items-center justify-center space-x-3">
                                    <button type="button"
                                        class="rounded-md bg-indigo-600 px-5 py-2 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        <a href="/chat/{{ $user->id }}" class="text-black-300 hover:text-gray-100 ">
                                            Chat</a></button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
