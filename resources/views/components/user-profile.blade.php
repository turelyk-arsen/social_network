<div class="py-10 bg-white">
    <div class="max-w-7xl pb-20 mx-auto sm:px-6 lg:px-8">
        <div>Hello {{ Auth::user()->name }} !</div>
        <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-50 text-gray-900 dark:text-gray-100 flex items-end justify-evenly gap-x-6 py-5">
                <div class="flex gap-x-4">

                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ Auth::user()->name }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ Auth::user()->email }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500">{{ Auth::user()->created_at }}</p>

                    </div>

                </div>
                <img class="h-40 w-40 flex-none rounded-full bg-white border-8 border-white"
                    src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/No_image_available.svg.png') }}"
                    alt="">
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900"> {{ Auth::user()->about }}</p>
                </div>


            </div>
        </div>
    </div>
</div>
