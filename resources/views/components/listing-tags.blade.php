@props(['tagsCsv'])

{{-- php directive  --}}
@php

    $tags = explode(',', $tagsCsv);

@endphp

<ul class="flex">
    @foreach ($tags as $tag)
        <li class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">

            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach

</ul>
