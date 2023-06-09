@props(['tagsS'])

@php
    $tags = explode(',', $tagsS);
@endphp

<ul>
    @foreach ($tags as $index => $tag)
    <li class="items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block
        @if($index === 0)
            bg-pink-500
        @elseif($index === 1)
            bg-purple-500
        @elseif($index === 2)
            bg-red-500
        @endif
    ">
        <a href="/posts/?tag={{ $tag }}">{{ $tag }}</a>
    </li>
@endforeach
</ul>