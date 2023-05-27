<div style class=" bg-white px-4  py-10 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8 tails-selected-element "
    contenteditable="false">
    <hr style="width: 70%; margin: 40px auto ">
    <nav class="flex flex-wrap justify-center -mx-5 -my-0 ">
        <div class="px-5 py-2 ">
            <a href="/" class="text-base uppercase leading-6 text-gray-500 hover:text-gray-900 not-italic">
                Welcome
            </a>
        </div>
        <div class="px-5 py-2">
            <a href="/posts" class="text-base uppercase leading-6 text-gray-500 hover:text-gray-900 not-italic">
                Home
            </a>
        </div>
        <div class="px-5 py-2">
            <a href="/dashboard" class="text-base uppercase  leading-6 text-gray-500 hover:text-gray-900 not-italic">
                Profile
            </a>
        </div>
        <div class="px-5 py-2 ">
            {{-- <a href="/chat/{{Auth::user()->id}}"  class="text-base  uppercase leading-6 text-gray-500 hover:text-gray-900"> --}}
            @if (Auth::user())
                <a href="/chat/{{ Auth::user()->id }}"
                    class="text-base  uppercase leading-6 text-gray-500 hover:text-gray-900 not-italic">
                    Chat
                </a>
            @else
                <a href="/login" class="text-base  uppercase leading-6 text-gray-500 hover:text-gray-900 not-italic">
                    Chat
                </a>
            @endif
        </div>
        <div class="px-5 py-2">
            @if (Auth::user())
                <a href="/contact" class="text-base uppercase leading-6 text-gray-500 hover:text-gray-900 not-italic">
                    Contact
                </a>
            @else
                <a href="/login" class="text-base uppercase leading-6 text-gray-500 hover:text-gray-900 not-italic">
                    Contact
                </a>
            @endif
        </div>

    </nav>

    <p class="mt-8  uppercase text-xs leading-6 text-center text-indigo-400 not-italic">
        © 2023 Arsen Turelyk. All rights reserved.
    </p>
</div>
