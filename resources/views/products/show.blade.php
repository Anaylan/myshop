<x-app-layout>
    <section class="container bg-white flex-auto p-4 rounded-lg border">
        <div class="flex items-center">
            <div class=" w-full">
                <img class="h-full max-w-4xl" src="{{ url($product->image) }}" alt="{{$product->name}}">
            </div>
            <div class="w-auto mx-6 mt-5 flex-auto">
                <h3 class="text-2xl font-medium text-gray-700 uppercase">{{ $product->name }}</h3>
                <hr class="my-3">
                <div class="descr">
                    {!! $product->description !!}
                </div>
                <hr class="my-3">
                <div class="mt-2">
                    <span class="text-gray-500"> цена за шт. {{ $product->price }} &#8381;</span>
                </div>

                <div class="flex items-center mt-6">
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none 
            focus:bg-indigo-500">
                            Добавить в корзину
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <section class="my-3">
            <p class="text-2xl font-medium text-gray-700">Похожие</p>
            <div class="grid grid-cols-6 gap-3">
                @foreach ($relatedProducts as $relatedPost )
                <a href="{{ route('products.show', ['product' => $relatedPost]) }}">
                    <div class="border bg-white rounded-lg overflow-hidden">
                        <img src="{{asset($relatedPost->image)}}" alt="" loading="lazy" />
                        <h4 class="p-2">
                            {{$relatedPost->name}}
                        </h4>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        <section class="mt-6 bg-white relative border flex flex-col overflow-hidden rounded-lg px-4">
            <h2 class="pt-3 pb-2 text-gray-800 text-lg">Отзывы</h2>
            <form method="post" action="{{ route('review.add') }}" class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    @csrf
                    <div class="w-full px-3 mb-2 mt-2">
                        <textarea name="review" required class="bg-gray-100 rounded border border-gray-300 leading-normal resize-none w-full h-20 py-2
                         px-3 font-medium
                         placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Написать отзыв...."></textarea>
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    </div>
                    <div class="w-full flex items-start justify-end md:w-full px-3">
                        <input type="submit" class="px-4 py-2 bg-indigo-600 text-white text-md font-medium rounded hover:bg-indigo-500 focus:outline-none 
                        focus:bg-indigo-500" value="Отправить" />
                    </div>
                </div>
            </form>
            <div class="pt-3 mb-12 border-t border-gray-300">
                @include('includes.review', ['reviews' => $product->reviews, 'product_id' => $product->id])
            </div>
        </section>
    </section>
</x-app-layout>