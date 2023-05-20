<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit comment' ) }}
        </h2>
    </x-slot>

    <section class="relative py-20 overflow-hidden bg-white p-10 max-w-4xl mx-auto mt-10">
        <form method="POST" action="/posts/{{ $comment->id }}/edit">
            @csrf
            @method('PUT')
            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
            <input type="hidden" name="user_id" value="{{ $comment->user_id  }}">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit comment to the post</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be
                        careful what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Comment</label>
                            <div class="mt-2">
                                <textarea id="content" name="content" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $comment->content }}</textarea>
                            </div>
                            @error('content')
                                <p class='text-red-500 text-xs mt-1'> {{ $message }}</p>
                            @enderror
                            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences your comment.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a href="/posts"
                            class="text-black ml-4"> Cancel</a></button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
        </form>
    </section>

</x-app-layout>
