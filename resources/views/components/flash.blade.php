@if (session()->has('message'))
    <div class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-black rounded-lg px-48 py-3" x-data={show:true}
        x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <p>{{ session('message') }}</p>
    </div>
@endif