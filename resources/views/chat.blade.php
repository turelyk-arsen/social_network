<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5"> 
        
        @foreach ($users as $user)
                    <h1 class="text-2xl font-semibold mb-4">Chat with {{ $user->name }}</h1>
                     @endforeach
        <div class="flex justify-center">
            <div class="w-full sm:w-1/2">
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <h1 class="text-2xl font-semibold mb-4">Chat with {{$to_user_id->name}}</h1>

                    <div class="flex flex-col space-y-4">
                        <!-- Display messages here -->

                        <!-- Example message -->
                        {{-- <div class="bg-gray-100 p-4 rounded-lg">
                            <div class="text-gray-700">John Doe</div>
                            <div class="text-gray-600">Hello there!</div>
                        </div>

                        <!-- Example message -->
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
