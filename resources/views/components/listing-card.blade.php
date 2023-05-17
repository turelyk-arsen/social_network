@props(['listing'])

<x-card style="padding: 30px; border-radius: 20px">


    <img class="hidden w-100% py-5 mr-6 md:block " {{-- lets use the asset() --}}
        src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.jpg') }}" alt="" />

    <div class="flex items-center gap-x-4 text-xs justify-between py-5 ">
        <time datetime="2020-03-16" class="text-gray-500">{{ $listing->date }}Mar 16, 2020</time>
        <div>
            <x-listing-tags :tagsCsv="$listing->tags" />
        </div>
    </div>
    <div class="group relative">
        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a href="#">
                <span class="absolute inset-0"> <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a></span>

            </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"> {{ $listing->description }}Illo sint
            voluptas.
            Error
            voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus
            unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>
    </div>
    <div class="relative mt-8 flex items-center gap-x-4">
        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="" class="h-10 w-10 rounded-full bg-gray-50">
        <div class="text-sm leading-6">
            <p class="font-semibold text-gray-900">
                <a href="#">
                    <span class="absolute inset-0"></span>
                    {{ $listing->user }}Michael Foster
                </a>
            </p>
            <p class="text-gray-600"> {{ $listing->user }}Co-Founder / CTO</p>
        </div>
    </div>


    </div>

</x-card>
