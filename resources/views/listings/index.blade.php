<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

</x-app-layout>
<x-layout>
    @include('partials._hero')


    <div style="margin-top: 0px"class="sm:py-5 m-20 ">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Search the post</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Browse other people posts or search the topic
                </p>

            </div>
            @include('partials._search')


        </div>
        <div class="mt-6 p-4">
            {{ $listings->links() }}
        </div>
    </div>

    <article style="justify-content: space-evenly; margin: auto "
        class="   mx-auto  grid-cols-1 flex flex-row  gap-10  flex-wrap  lg:mx-0 lg:max-w-none lg:grid-cols-3">

        @if (count($listings) == 0)
            <p>No listing found</p>
        @endif

        @foreach ($listings as $listing)
            <div style="width: 550px ">
                <x-listing-card :listing="$listing" />
            </div>
        @endforeach

    </article>



</x-layout>
