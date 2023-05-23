<div class="bg-white px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8 tails-selected-element"
    contenteditable="false">
    <hr style="width: 70%; margin: 40px auto ">
    <nav class="flex flex-wrap justify-center -mx-5 -my-0 ">
        <div class="px-5 py-2 ">
            <a href="/" class="text-base uppercase leading-6 text-gray-500 hover:text-gray-900">
                Welcome
            </a>
        </div>
        <div class="px-5 py-2">
            <a href="/posts" class="text-base uppercase leading-6 text-gray-500 hover:text-gray-900">
                Home
            </a>
        </div>
        <div class="px-5 py-2">
            <a href="/dashboard" class="text-base uppercase  leading-6 text-gray-500 hover:text-gray-900">
                Profile
            </a>
        </div>
        <div class="px-5 py-2">
            <a href="/chat/{{Auth::user()->id}}"  class="text-base  uppercase leading-6 text-gray-500 hover:text-gray-900">
                Chat
            </a>
        </div>
        <div class="px-5 py-2">
            <a href="/contact" class="text-base uppercase leading-6 text-gray-500 hover:text-gray-900">
                Contact
            </a>
        </div>

    </nav>

    <p class="mt-8  uppercase text-xs leading-6 text-center text-gray-400">
        © 2023 PopisdIN. All rights reserved.
    </p>
</div>