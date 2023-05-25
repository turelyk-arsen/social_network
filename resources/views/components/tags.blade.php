@props(['tagsS'])

@php
    $tags = explode(',', $tagsS);
@endphp

{{-- <ul> --}}
@foreach ($tags as $tag)
    {{-- <li
            class="inline-flex items-center justify-center px-4 py-2 my-3 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none tails-selected-element">
            <a href="/posts/?tag={{ $tag }}">{{ $tag }}</a>
        </li> --}}
    <span style="border: 1px solid rgb(73, 73, 73); margin-left: 0px; margin-right:5px"
        class="uppercase text-gray-600 hover:text-white hover:bg-indigo-400 hover:border-0 text-xs  rounded-lg bg-transparent  inline-block mt-4 ml-4 py-1.5 px-4 cursor-pointer">{{ $tag }}</span>
@endforeach
{{-- </ul> --}}
