<?php
use App\Models\User;
?>
@if (Auth::user()->name == 'admin')

    <section class=" bg-white tails-selected-element ">
        <div class="container max-w-6xl mx-auto ">
            <p style="color:  #8c84ff;" class="px-10 mb-10 mt-40 font-medium tracking-wide text-gray-400 uppercase">Open
                the
                post to
                see it in details </p>
            <h2 style="font-family: 'Comfortaa', cursive; "
                class="relative  px-10 mb-20 text-4xl font-semibold leading-tight lg:text-5xl uppercase ">
                List of all users</h2>
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

                        <section class="space-y-6 ">
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
                                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

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
