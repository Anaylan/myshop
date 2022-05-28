<x-app-layout>
    <section class="container">
        <h2 class="header-title">Новости</h2>
        @include('includes.flash-message')
        <div class="searchbar">
            <form action="">
                <x-input type="text" placeholder="Search..." name="search" />

                <x-button type="submit">
                    Искать
                    <i class="fa fa-search"></i>
                </x-button>

            </form>
        </div>
        <div class="my-4">
            <ul class="flex flex-col">
                @foreach ($categories as $category)
                <li><a href="{{route('blog.index', ['category' => $category->name ])}}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="grid grid-cols-5 gap-5 mb-5">
            @forelse($posts as $post)
            <div class="bg-white overflow-hidden relative rounded-lg shadow-md border flex-auto">
                <a href="{{ route('blog.show', $post) }}" class="h-full max-h-full flex flex-col">
                    <img src="{{ asset($post->imagePrevPath) }}" alt="{{$post->title}}" class=" border-b border-gray-300" />

                    <div class="px-3 py-2 flex flex-col flex-auto">
                        <h4 class="border-b mb-1 text-lg font-medium">
                            {{ $post->title }}
                        </h4>
                        <p class="border-b mb-1 flex-auto">
                            {{ $post->category->name }}
                        </p>
                        <p class="text-sm text-gray-600 justify-end text-right">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </a>
            </div>
            @empty
            <p>Извините, в настоящее время в блоге нет записей, связанных с этим запросом!</p>
            @endforelse

        </div>
        <!-- pagination -->

        {{ $posts->links('pagination::tailwind') }}
        <br>
    </section>
</x-app-layout>