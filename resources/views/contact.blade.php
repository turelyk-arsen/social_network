<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact form') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center w-screen h-screen bg-white">
        <!-- COMPONENT CODE -->
        <div class="container mx-auto  px-4 lg:px-20">

            <div class="w-full p-8 my-4 md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 mr-auto rounded-2xl ">
                <div class="flex">
                    <h1 style="font-family: 'Comfortaa', cursive;" class="mb-10 font-bold uppercase text-5xl">Send us a
                        message
                    </h1>
                </div>
                <form action="/send-email" method="POST">
                    {{-- <form action="mailto:admin@example.com" method="POST" enctype="text/plain"> --}}
                    @csrf
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                            <input name="first_name" value="{{ old('first_name') }}"
                                class="block flex-1 border-0 bg-transparent p-3  text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                type="text" placeholder="First Name*" />
                            @error('first_name')
                                <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                            @enderror
                        </div>
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                            <input name="last_name" value="{{ old('last_name') }}"
                                class="block flex-1 border-0 bg-transparent p-3  text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                type="text" placeholder="Last Name*" />
                            @error('last_name')
                                <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                            @enderror
                        </div>
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                            <input name="email" value="{{ old('email') }}"
                                class="block flex-1 border-0 bg-transparent p-3  text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                type="email" placeholder="Email*" />
                            @error('email')
                                <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                            @enderror
                        </div>
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input name="phone" value="{{ old('phone') }}"
                                class="block flex-1 border-0 bg-transparent p-3  text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                type="number" placeholder="Phone*" />
                            @error('phone')
                                <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div>
                        <div
                            class="mt-5 flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                            <textarea placeholder="Message*" name="messText"
                                class=" w-full h-32 bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline  border-0 bg-transparent placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">{{ old('message') }}</textarea>
                            @error('messText')
                                <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="my-2 w-1/2 lg:w-1/4">
                        <button type="submit"
                            style="border: 1px solid rgb(73, 73, 73); margin-left: 0px; margin-right:5px"
                            class="uppercase text-gray-600 hover:text-white hover:bg-indigo-400 hover:border-0 text-xs  rounded-lg bg-transparent  inline-block mt-4 ml-4 py-1.5 px-4 cursor-pointer">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <div style="text-align:center;
              padding-bottom: 0rem;  "
                class="border-gray-500 justify-center  px-8 py-12  justify-items-center flex-row auto-rows-auto content-start ">
                <div style="text-align:center;"
                    class="content-start  justify-center gap-8 flex flex-row text-gray-600 ">
                    <div class="flex flex-col w-1/4">
                        <h1 style="font-family: 'Comfortaa', cursive;" class="font-bold uppercase text-4xl my-4">INFOS
                        </h1>
                        <p class="text-gray-400">If you have any question, request or suggestion, feel free to contact
                            by
                            filling this form. Feeling old-fashionish? Just send a mail or call us! We look forward to
                            hearing from you.
                        </p>
                    </div>
                    <div style="text-align:center;" class="justify-items-center justify-center flex my-4 w-1/4">
                        <div class="flex flex-col justify-center justify-items-center ">
                            <i class="fas fa-map-marker-alt pt-10 pr-2"></i>
                        </div>
                        <div style="text-align:center; " class="flex flex-col justify-center justify-items-center">
                            <h2 class="text-2xl">Main Office</h2>
                            <p class="text-gray-400">5555 Tailwind RD, Pleasant Grove, UT 73533</p>
                        </div>
                    </div>

                    <div style="text-align:center;" class="flex flex-col">
                        <div class="flex flex-col">
                            <i class="fas fa-phone-alt pt-2 pr-2"></i>
                        </div>
                        <div class="flex flex-col ">
                            <h2 class="text-2xl">Call Us</h2>
                            <p class="text-gray-400">Tel: = (352) 691-444-421</p>
                            <p class="text-gray-400">Fax: (352) 691-444-422</p>
                        </div>
                    </div>
                    <!--
                    <div class="flex my-4 w-2/3 lg:w-1/2">
                        <a href="https://www.facebook.com/ENLIGHTENEERING/" target="_blank" rel="noreferrer"
                            class="rounded-full bg-white h-8 w-8 inline-block mx-1 text-center pt-1">
                            <i class="fab fa-facebook-f text-blue-900" />
                        </a>
                        <a href="https://www.linkedin.com/company/enlighteneering-inc-" target="_blank" rel="noreferrer"
                            class="rounded-full bg-white h-8 w-8 inline-block mx-1 text-center pt-1">
                            <i class="fab fa-linkedin-in text-blue-900" />
                        </a>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- COMPONENT CODE -->
    </div>

</x-app-layout>
