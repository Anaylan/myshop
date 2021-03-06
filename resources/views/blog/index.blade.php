<x-app-layout>
    <x-slot name="title">Новости</x-slot>
    <section class="container md:mt-0 mt-4">
        @include('includes.flash-message')
        <div class="mb-4 px-3 xl:px-0 flex flex-row justify-between">
            <h3 class="text-2xl font-medium text-gray-700">Новости</h3>
            <form action="{{ route('blog.index') }}" class="">
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center sm:pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input name="search" type="text" id="search" class="block xl:w-96 lg:w-80 md:w-64 p-3 pl-10 text-sm text-gray-900 bg-gray-50 rounded-lg border
                     border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Поиск по новостям..." required>
                    <button type="submit" class="text-white absolute right-1.5 px-3 py-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm">Искать</button>
                </div>
            </form>
        </div>
        <div class="grid xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 grid-cols-2 px-3 xl:px-0 gap-5 mb-5">
            @forelse($posts as $post)
            <div class="bg-white hover:-translate-y-6 duration-150 overflow-hidden border-gray-300 relative rounded-lg shadow-md border flex-auto">
                <a href="{{ route('blog.show', $post) }}" target="_blank" class="h-full max-h-full flex flex-col">
                    <img src="{{ asset($post->img_prev) }}" alt="{{$post->title}}" class=" border-b border-gray-300" />
                    <div class="px-3 py-2 flex flex-col flex-auto">
                        <h4 class="text-lg font-medium">
                            {{ $post->title }}
                        </h4>
                        <p class="text-sm mt-auto border-t text-gray-600 justify-end text-right">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </a>
            </div>
            @empty
            <p>Извините, в настоящее время в блоге нет записей!</p>
            @endforelse
        </div>
        <!-- pagination -->
        <br>
        {{ $posts->links('pagination::tailwind') }}
        <br>
    </section>
</x-app-layout>