<x-app-layout>
    <x-slot name="title">Главная</x-slot>
    <div class="container">
        <div class="bg-white p-3 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="pb-4">
                <h1 class="text-2xl font-medium text-left text-gray-700 mb-2">Последние новости</h1>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($posts as $post)
                        <div class="swiper-slide hover:shadow-xl duration-300">
                            <div class="hover:shadow shadow-none bg-white overflow-hidden rounded-lg border">
                                <a href="{{ route('blog.show', $post) }}" class="flex flex-col hover:shadow shadow-none">
                                    <img src="{{ asset($post->img_prev) }}" alt="{{$post->title}}" class="border-b h-52 border-gray-300" />
                                    <div class="px-3 py-2 flex flex-col flex-auto">
                                        <h4 class="text-md font-medium">
                                            {{ $post->title }}
                                        </h4>
                                        <p class="text-sm mt-auto border-t text-gray-600 justify-end text-right">
                                            {{ $post->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="flex justify-end pt-1">
                    <a href="{{ route('blog.index') }}" class="text-sm text-gray-600">Посмотреть всё</a>
                </div>
            </div>
            <div class="pb-3">
                <h1 class="text-2xl font-medium text-left text-gray-700 mb-2">Последние товары</h1>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($products as $product)
                        <div class="swiper-slide flex flex-col bg-white overflow-hidden rounded-md border hover:shadow-xl duration-300">
                            <a href="{{ route('products.show', ['product' => $product->id]) }}" class="flex justify-center pt-1 border-b">
                                <img src="{{ url($product->image) }}" alt="" class="w-auto h-56">
                            </a>
                            <div class="px-4 py-3 flex flex-col flex-auto">
                                <a class="mb-2 border-b" href="{{ route('products.show', ['product' => $product->id]) }}">
                                    <h3 class="text-gray-900 font-bold text-lg">{{ $product->name }}</h3>
                                </a>
                                <form action="{{ route('cart.store') }}" method="POST" class="mt-auto" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    <div class="flex item-center justify-between">
                                        <h1 class="text-gray-700 mt-a font-bold text-md whitespace-nowrap float-left content-center">{{ $product->price }} &#8381;</h1>
                                        <button class="px-4 py-2 bg-gray-800 text-white text-xs font-bold float-right uppercase rounded"><i class="fas fa-cart-arrow-down"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="flex justify-end pt-1">
                    <a href="{{ route('products.list') }}" class="text-sm text-gray-600">Посмотреть всё</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>