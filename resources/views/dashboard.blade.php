<?php
use App\Models\User;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-[url('/images/735277.jpg')] bg-cover">

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

        {{-- User profile --}}
        <div class="py-10 ">
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
        </div>

        {{-- Admin delete user --}}
        @if (Auth::user()->name == 'admin')

            <section class="py-20 bg-white tails-selected-element">
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
        @endif


        {{-- list of post ---- user --}}
        <section class="py-20 bg-white tails-selected-element">
            <div class="container max-w-6xl mx-auto">
                {{-- @yield('joke') --}}
                <x-joke :joke=$joke />
                <h2 class="text-4xl font-bold tracking-tight text-center">My posts</h2>
                <p class="mt-2 text-lg text-center text-gray-600">Check out my list of awesome posts below.</p>
                <div class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0">

                    <div class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class="p-3 text-white bg-blue-500 rounded-full" data-primary="blue-500"
                            data-rounded="rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5" class=""></path>
                                <circle cx="6" cy="14" r="3" class=""></circle>
                                <path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-medium text-gray-700">Certifications</h4>
                        <p class="text-base text-center text-gray-500">Each of our plan will provide you and your team
                            with
                            certifications.</p>
                    </div>

                    <div class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class="p-3 text-white bg-blue-500 rounded-full" data-primary="blue-500"
                            data-rounded="rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M18 8a3 3 0 0 1 0 6" class=""></path>
                                <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5"></path>
                                <path
                                    d="M12 8h0l4.524 -3.77a0.9 .9 0 0 1 1.476 .692v12.156a0.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8"
                                    class=""></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-medium text-gray-700">Notifications</h4>
                        <p class="text-base text-center text-gray-500">Send out notifications to all your customers to
                            keep
                            them engaged.</p>
                    </div>

                    <div class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class="p-3 text-white bg-blue-500 rounded-full" data-primary="blue-500"
                            data-rounded="rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                            </svg>
                        </div>
                        <h4 class="text-xl font-medium text-gray-700">Bundles</h4>
                        <p class="text-base text-center text-gray-500">High-quality bundles of awesome tools to help
                            you
                            out.</p>
                    </div>

                    <div class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class="p-3 text-white bg-blue-500 rounded-full" data-primary="blue-500"
                            data-rounded="rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 9l3 3l-3 3"></path>
                                <line x1="13" y1="15" x2="16" y2="15"></line>
                                <rect x="3" y="4" width="18" height="16" rx="2">
                                </rect>
                            </svg>
                        </div>
                        <h4 class="text-xl font-medium text-gray-700">Developer Tools</h4>
                        <p class="text-base text-center text-gray-500">Developer tools to help grow your application
                            and
                            keep it up-to-date.</p>
                    </div>

                    <div class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class="p-3 text-white bg-blue-500 rounded-full" data-primary="blue-500"
                            data-rounded="rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="9.5" y1="11" x2="9.51" y2="11"></line>
                                <line x1="14.5" y1="11" x2="14.51" y2="11"></line>
                                <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                                <path
                                    d="M7 5h1v-2h8v2h1a3 3 0 0 1 3 3v9a3 3 0 0 1 -3 3v1h-10v-1a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-medium text-gray-700">Building Blocks</h4>
                        <p class="text-base text-center text-gray-500">The right kind of building blocks to take your
                            company to the next level.</p>
                    </div>

                    <div class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <div class="p-3 text-white bg-blue-500 rounded-full" data-primary="blue-500"
                            data-rounded="rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="15" y1="5" x2="15" y2="7"></line>
                                <line x1="15" y1="11" x2="15" y2="13"></line>
                                <line x1="15" y1="17" x2="15" y2="19"></line>
                                <path
                                    d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-medium text-gray-700">Coupons</h4>
                        <p class="text-base text-center text-gray-500">Coupons system to provide special offers and
                            discounts for your app.</p>
                    </div>

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
                <p class="font-medium tracking-wide text-blue-500 uppercase">My Friends</p>
                <h2 class="relative max-w-lg mt-5 mb-10 text-4xl font-semibold leading-tight lg:text-5xl">An incredible
                    friend of amazing individuals</h2>
                <div class="grid w-full grid-cols-2 gap-10 sm:grid-cols-3 lg:grid-cols-4">
                    <div class="flex flex-col items-center justify-center col-span-1">
                        <div class="relative p-5">
                            <div
                                class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-blue-50">
                            </div>
                            <img class="relative z-20 w-full rounded-full"
                                src="https://cdn.devdojo.com/images/june2021/avt-03.jpg">
                        </div>
                        <div class="mt-3 space-y-2 text-center">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Freddy Smith</h3>
                                <p class="text-blue-600">CEO and Founder</p>
                            </div>
                            <div class="relative flex items-center justify-center space-x-3">
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center col-span-1">
                        <div class="relative p-5">
                            <div
                                class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50">
                            </div>
                            <img class="relative z-20 w-full rounded-full"
                                src="https://cdn.devdojo.com/images/june2021/avt-07.jpg">
                        </div>
                        <div class="mt-3 space-y-2 text-center">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Carl Jones</h3>
                                <p class="text-blue-600">CTO and Co-Founder</p>
                            </div>
                            <div class="relative flex items-center justify-center space-x-3">
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center col-span-1">
                        <div class="relative p-5">
                            <div
                                class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-pink-50">
                            </div>
                            <img class="relative z-20 w-full rounded-full"
                                src="https://cdn.devdojo.com/images/june2021/avt-20.jpg">
                        </div>
                        <div class="mt-3 space-y-2 text-center">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Susan Peterson</h3>
                                <p class="text-blue-600">Marketing Directory</p>
                            </div>
                            <div class="relative flex items-center justify-center space-x-3">
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center col-span-1">
                        <div class="relative p-5">
                            <div
                                class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50">
                            </div>
                            <img class="relative z-20 w-full rounded-full"
                                src="https://cdn.devdojo.com/images/june2021/avt-09.jpg">
                        </div>
                        <div class="mt-3 space-y-2 text-center">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Tommy Barnes</h3>
                                <p class="text-blue-600">Designer</p>
                            </div>
                            <div class="relative flex items-center justify-center space-x-3">
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center col-span-1">
                        <div class="relative p-5">
                            <div
                                class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50">
                            </div>
                            <img class="relative z-20 w-full rounded-full"
                                src="https://cdn.devdojo.com/images/june2021/avt-14.jpg">
                        </div>
                        <div class="mt-3 space-y-2 text-center">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Ron Jenson</h3>
                                <p class="text-blue-600">Senior Developer</p>
                            </div>
                            <div class="relative flex items-center justify-center space-x-3">
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center col-span-1">
                        <div class="relative p-5">
                            <div
                                class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-pink-50">
                            </div>
                            <img class="relative z-20 w-full rounded-full"
                                src="https://cdn.devdojo.com/images/june2021/avt-13.jpg">
                        </div>
                        <div class="mt-3 space-y-2 text-center">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3 class="">Pete Tompkins</h3>
                                <p class="text-blue-600">Web Developer</p>
                            </div>
                            <div class="relative flex items-center justify-center space-x-3">
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center col-span-1">
                        <div class="relative p-5">
                            <div
                                class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50">
                            </div>
                            <img class="relative z-20 w-full rounded-full"
                                src="https://cdn.devdojo.com/images/june2021/avt-16.jpg">
                        </div>
                        <div class="mt-3 space-y-2 text-center">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Kelly Richards</h3>
                                <p class="text-blue-600">Sales Manager</p>
                            </div>
                            <div class="relative flex items-center justify-center space-x-3">
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center col-span-1">
                        <div class="relative p-5">
                            <div
                                class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-blue-50">
                            </div>
                            <img class="relative z-20 w-full rounded-full"
                                src="https://cdn.devdojo.com/images/june2021/avt-08.jpg">
                        </div>
                        <div class="mt-3 space-y-2 text-center">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Alexis Jordan</h3>
                                <p class="text-blue-600">Affiliate Manager</p>
                            </div>
                            <div class="relative flex items-center justify-center space-x-3">
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#_" class="text-gray-300 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>