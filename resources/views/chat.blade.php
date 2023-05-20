<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="container flex mx-auto mt-5">
        <ul>
            @foreach ($users as $user)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                            src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/No_image_available.svg.png') }}">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $user->name }}</p>
                            <button type="button"
                                class="rounded-md bg-indigo-600 px-5 py-2 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <a href="/chat/{{ $user->id }}" class="text-black-300 hover:text-gray-100 ">
                                    Chat</a></button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="flex justify-center w-full sm:w-3/4">
            <div class="w-full sm:w-3/4">
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <h1 class="text-2xl font-semibold mb-4">Chat with {{ $to_user_id->name }}</h1>

                    <div class="flex flex-col space-y-4">
                        <!-- Display messages here -->

                        <!-- Example message -->
                        {{-- @foreach ($messages as $message)
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <div class="text-gray-700">{{ $message->content }}</div>
                            </div>
                        @endforeach --}}

                        @foreach ($messages as $message)
                            @if ($message->from_user_id == $from_user_id->id)
                                <div class="bg-gray-200 p-4 rounded-lg">
                                    <p class="text-gray-700">{{ $message->content }}</p>
                                    <span>Sent by You</span>
                                </div>
                            @else
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-gray-700">{{ $message->content }}</p>
                                    <span>Received from {{ $to_user_id->name }}</span>
                                </div>
                            @endif
                        @endforeach
                        {{-- <!-- Example message -->
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <div class="text-gray-700">Jane Smith</div>
                            <div class="text-gray-600">Hi, how are you?</div>
                        </div> --}}
                    </div>
                    <form action="/chat/send-message" method="post" class="mt-4">
                        @csrf
                        <div class="flex">
                            <input type="hidden" name="to_user_id" value="{{ $to_user_id->id }}">
                            <input type="hidden" name="from_user_id" value="{{ $from_user_id->id }}">
                            <input type="text" name="content"
                                class="flex-1 border-gray-300 rounded-l-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                placeholder="Type a message">
                            <button type="submit"
                                class="bg-indigo-500 text-white py-2 px-4 rounded-r-lg ml-2">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
