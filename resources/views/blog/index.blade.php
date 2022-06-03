<x-app-layout>
    <section class="container">
        @include('includes.flash-message')
        <div class="mb-4 flex flex-row justify-between">
            <h3 class="text-2xl font-medium text-gray-700">Новости</h3>
            <form action="{{ route('blog.index') }}" class="">
                <x-input type="text" placeholder="Поиск..." name="search" />
                <x-button type="submit">
                    Искать
                    <i class="fa fa-search"></i>
                </x-button>
            </form>
        </div>
        <div class="grid grid-cols-5 gap-5 mb-5">
            @forelse($posts as $post)
            <div class="bg-white overflow-hidden relative rounded-lg shadow-md border flex-auto">
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