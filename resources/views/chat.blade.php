<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    {{-- <div class="container flex mx-auto mt-5">
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
    </div> --}}


    <div>
        <div class="w-full h-32 bg-[#449388]"></div>
        <div class="container mx-auto -mt-32">

            <div class="py-6 h-screen ">
                <div class="flex border border-gray-500 rounded shadow-lg h-full">

                    <!-- Left -->
                    <div class="w-1/3 border flex flex-col">
                        <!-- Header -->
                        <div class="py-2 px-3 bg-gray-200 flex flex-row justify-between items-center">
                            <div>
                                <img class="w-10 h-10 rounded-full" src="{{ $to_user_id->photo ? asset('storage/' . $to_user_id->photo) : asset('images/No_image_available.svg.png') }}"/>
                            </div>

                            <div class="flex">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#727A7E" d="M12 20.664a9.163 9.163 0 0 1-6.521-2.702.977.977 0 0 1 1.381-1.381 7.269 7.269 0 0 0 10.024.244.977.977 0 0 1 1.313 1.445A9.192 9.192 0 0 1 12 20.664zm7.965-6.112a.977.977 0 0 1-.944-1.229 7.26 7.26 0 0 0-4.8-8.804.977.977 0 0 1 .594-1.86 9.212 9.212 0 0 1 6.092 11.169.976.976 0 0 1-.942.724zm-16.025-.39a.977.977 0 0 1-.953-.769 9.21 9.21 0 0 1 6.626-10.86.975.975 0 1 1 .52 1.882l-.015.004a7.259 7.259 0 0 0-5.223 8.558.978.978 0 0 1-.955 1.185z"></path></svg>
                                </div>
                                <div class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path opacity=".55" fill="#263238" d="M19.005 3.175H4.674C3.642 3.175 3 3.789 3 4.821V21.02l3.544-3.514h12.461c1.033 0 2.064-1.06 2.064-2.093V4.821c-.001-1.032-1.032-1.646-2.064-1.646zm-4.989 9.869H7.041V11.1h6.975v1.944zm3-4H7.041V7.1h9.975v1.944z"></path></svg>
                                </div>
                                <div class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".6" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path></svg>
                                </div>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="py-2 px-2 bg-gray-200">
                            <input type="text" class="w-full px-2 py-2 text-sm"
                                placeholder="Search or start new chat" />
                        </div>
                        <!-- Contacts -->
                        <div class="bg-grey-900 flex-1 overflow-auto">
                        @foreach ($users as $user)
                            <a href="/chat/{{ $user->id }}">
                                <div class="bg-white px-3 flex items-center hover:bg-gray-200 cursor-pointer">
                                    <div>
                                        <img class="h-12 w-12 rounded-full"
                                            src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/No_image_available.svg.png') }}" />
                                    </div>
                                    <div class="ml-4 flex-1 border-b border-gray-300 py-4">
                                        <div class="flex items-bottom justify-between">
                                            <p class="text-gray-900">
                                                {{ $user->name }}
                                            </p>
                                            <p class="text-xs text-gray-900">
                                                12:45 pm
                                            </p>
                                        </div>
                                        <p class="text-gray-700 mt-1 text-sm">
                                            Status
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                    <!-- Right -->
                    <div class="w-2/3 border flex flex-col">

                        <!-- Header -->
                        <div class="py-2 px-3 bg-gray-200 flex flex-row justify-between items-center">
                        <div class="flex items-center">
                            <div>
                                <img class="w-10 h-10 rounded-full"
                                    src="{{ $to_user_id->photo ? asset('storage/' . $to_user_id->photo) : asset('images/No_image_available.svg.png') }}" />
                            </div>
                            <div class="ml-4">
                                <p class="text-grey-darkest">
                                     {{ $to_user_id->name }}
                                </p>
                                <p class="text-grey-darker text-xs mt-1">
                                    New Message!
                                </p>
                            </div>
                        </div>

                        <div class="flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path fill="#263238" fill-opacity=".5"
                                        d="M15.9 14.3H15l-.3-.3c1-1.1 1.6-2.7 1.6-4.3 0-3.7-3-6.7-6.7-6.7S3 6 3 9.7s3 6.7 6.7 6.7c1.6 0 3.2-.6 4.3-1.6l.3.3v.8l5.1 5.1 1.5-1.5-5-5.2zm-6.2 0c-2.6 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2 4.6-4.6 4.6z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path fill="#263238" fill-opacity=".5"
                                        d="M1.816 15.556v.002c0 1.502.584 2.912 1.646 3.972s2.472 1.647 3.974 1.647a5.58 5.58 0 0 0 3.972-1.645l9.547-9.548c.769-.768 1.147-1.767 1.058-2.817-.079-.968-.548-1.927-1.319-2.698-1.594-1.592-4.068-1.711-5.517-.262l-7.916 7.915c-.881.881-.792 2.25.214 3.261.959.958 2.423 1.053 3.263.215l5.511-5.512c.28-.28.267-.722.053-.936l-.244-.244c-.191-.191-.567-.349-.957.04l-5.506 5.506c-.18.18-.635.127-.976-.214-.098-.097-.576-.613-.213-.973l7.915-7.917c.818-.817 2.267-.699 3.23.262.5.501.802 1.1.849 1.685.051.573-.156 1.111-.589 1.543l-9.547 9.549a3.97 3.97 0 0 1-2.829 1.171 3.975 3.975 0 0 1-2.83-1.173 3.973 3.973 0 0 1-1.172-2.828c0-1.071.415-2.076 1.172-2.83l7.209-7.211c.157-.157.264-.579.028-.814L11.5 4.36a.572.572 0 0 0-.834.018l-7.205 7.207a5.577 5.577 0 0 0-1.645 3.971z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path fill="#263238" fill-opacity=".6"
                                        d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                         </div>

                        <!-- Messages -->
                        <div class="flex-1 overflow-auto" style="background-color: #DAD3CC">
                            <div class="py-2 px-3">

                                <div class="flex justify-center mb-2">
                                    <div class="rounded py-2 px-4" style="background-color: #DDECF2">
                                        <p class="text-sm uppercase">
                                            May 21, 2023
                                        </p>
                                    </div>
                                </div>

                                <div class="flex justify-center mb-4">
                                    <div class="rounded py-2 px-4" style="background-color: #FCF4CB">
                                        <p class="text-xs">
                                            Messages to this chat and calls are now secured with end-to-end encryption.
                                            Tap
                                            for more info.
                                        </p>
                                    </div>
                                </div>

                                @foreach ($messages as $message)
                                @if ($message->from_user_id == $from_user_id->id)
                                    <div class="flex justify-end mb-2">
                                        <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                                            <p class="text-sm text-purple">
                                                {{$from_user_id->name}}
                                            </p>
                                            <p class="text-sm mt-1">
                                                {{ $message->content }}
                                            </p>
                                            <p class="text-right text-xs text-grey-dark mt-1">
                                                12:45 pm
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex mb-2">
                                        <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
                                            <p class="text-sm text-purple">
                                                {{$to_user_id->name}}
                                            </p>
                                            <p class="text-sm mt-1">
                                                {{ $message->content }}
                                            </p>
                                            <p class="text-right text-xs text-grey-dark mt-1">
                                                12:45 pm
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                                {{-- <div class="flex justify-end mb-2">
                                    <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                                        <p class="text-sm mt-1">
                                            Count me in
                                        </p>
                                        <p class="text-right text-xs text-grey-dark mt-1">
                                            12:45 pm
                                        </p>
                                    </div>
                                </div> --}}

                                {{-- <div class="flex mb-2">
                                    <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
                                        <p class="text-sm text-purple">
                                            Tom Cruise
                                        </p>
                                        <p class="text-sm mt-1">
                                            Get Andrés on this movie ASAP!
                                        </p>
                                        <p class="text-right text-xs text-grey-dark mt-1">
                                            12:45 pm
                                        </p>
                                    </div>
                                </div> --}}

                            </div>
                        </div>

                        <!-- Input -->
                        <div class="bg-grey-lighter px-4 py-4 flex items-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path opacity=".45" fill="#263238"
                                        d="M9.153 11.603c.795 0 1.439-.879 1.439-1.962s-.644-1.962-1.439-1.962-1.439.879-1.439 1.962.644 1.962 1.439 1.962zm-3.204 1.362c-.026-.307-.131 5.218 6.063 5.551 6.066-.25 6.066-5.551 6.066-5.551-6.078 1.416-12.129 0-12.129 0zm11.363 1.108s-.669 1.959-5.051 1.959c-3.505 0-5.388-1.164-5.607-1.959 0 0 5.912 1.055 10.658 0zM11.804 1.011C5.609 1.011.978 6.033.978 12.228s4.826 10.761 11.021 10.761S23.02 18.423 23.02 12.228c.001-6.195-5.021-11.217-11.216-11.217zM12 21.354c-5.273 0-9.381-3.886-9.381-9.159s3.942-9.548 9.215-9.548 9.548 4.275 9.548 9.548c-.001 5.272-4.109 9.159-9.382 9.159zm3.108-9.751c.795 0 1.439-.879 1.439-1.962s-.644-1.962-1.439-1.962-1.439.879-1.439 1.962.644 1.962 1.439 1.962z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1 mx-4">
                                <form action="/chat/send-message" method="post" class="mt-4">
                                    @csrf
                                    <div class="flex">
                                        <input type="hidden" name="to_user_id" value="{{ $to_user_id->id }}">
                                        <input type="hidden" name="from_user_id" value="{{ $from_user_id->id }}">
                                        <input type="text" name="content"
                                            class="w-full border rounded px-2 py-2"
                                            placeholder="Type a message">
                                        <button type="submit"
                                            class="bg-indigo-500 text-white py-2 px-4 rounded-r-lg ml-2">Send</button>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path fill="#263238" fill-opacity=".45"
                                        d="M11.999 14.942c2.001 0 3.531-1.53 3.531-3.531V4.35c0-2.001-1.53-3.531-3.531-3.531S8.469 2.35 8.469 4.35v7.061c0 2.001 1.53 3.531 3.53 3.531zm6.238-3.53c0 3.531-2.942 6.002-6.237 6.002s-6.237-2.471-6.237-6.002H3.761c0 4.001 3.178 7.297 7.061 7.885v3.884h2.354v-3.884c3.884-.588 7.061-3.884 7.061-7.885h-2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
