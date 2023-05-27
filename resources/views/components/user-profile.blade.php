<div class="py-10 bg-white">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-50 text-gray-900 dark:text-gray-100 flex items-center gap-x-10 pb-8 ">
                <div style="font-family: 'Comfortaa', cursive;">Hello {{ Auth::user()->name }} !</div>

                <img class="h-40 w-40 flex-none rounded-full bg-white  "
                    src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/No_image_available.svg.png') }}"
                    alt="">

                    <div class="min-w-0 flex-auto  ">
                        <p class="text-sm font-semibold leading-6 text-gray-900">NAME : {{ Auth::user()->name }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">EMAIL : {{ Auth::user()->email }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500"> ABOUT: {{ Auth::user()->about }}</p>
                    </div>

            </div>
        </div>
    </div>
</div>
