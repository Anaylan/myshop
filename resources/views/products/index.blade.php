<x-app-layout>
    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
            <div class="w-full flex flex-col bg-white overflow-hidden rounded-md shadow-lg">
                <a href="{{ route('products.show', ['product' => $product->id]) }}">
                    <img src="{{ url($product->image) }}" alt="" class="w-full max-h-60">
                </a>

                <div class="px-5 py-3">
                    <a href="{{ route('products.show', ['product' => $product->id]) }}">
                        <h3 class="text-gray-900 font-bold text-2xl">{{ $product->name }}</h3>
                    </a>
                    <span class="mt-2 text-gray-500"></span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        <div class="flex item-center justify-between mt-3">
                            <h1 class="text-gray-700 font-bold text-xl">{{ $product->price }} &#8381;</h1>
                            <button class="px-4 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Добавить в корзину</button>
                        </div>
                    </form>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>