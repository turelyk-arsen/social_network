@props(['user'])

<div class="relative p-5">
    <div class="absolute z-10 w-1/2 h-full -mt-5 -ml-2 rounded-full rounded-tr-none bg-green-100"></div>
    <img class="relative z-20 w-1/2 rounded-full" src="{{asset('storage/'.$user->photo)  }}">
</div>