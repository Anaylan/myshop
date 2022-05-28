<x-app-layout>
    <div class="md:flex md:items-center">
        <div class="w-full h-64 md:w-1/2 lg:h-96">
            <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{ url($product->image) }}" alt="Nike Air">
        </div>
        <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
            <h3 class="text-gray-700 uppercase text-lg">{{ $product->name }}</h3>

            <hr class="my-3">
            <div className="descr">
                {{ $product->description}}
            </div>
            <hr class="my-3">
            <div class="mt-2">

                <label class="text-gray-700 text-sm" for="count">Count:</label>
                <div class="flex items-center mt-1">
                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                    <input id="qty" type="number" value='1' name="quantity" class="border-0 w-6 flex justify-center text-center p-0 text-gray-700 bg-inherit 
                outline-none focus:outline-none hover:text-black focus:text-black" />
                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>

                </div>
            </div>
            <div class="mt-2">
                <span class="text-gray-500"> цена за шт. {{ $product->price }} &#8381;</span>
            </div>

            <div class="flex items-center mt-6">
                <a href="{{ url('payments') }}" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none 
            focus:bg-indigo-500">Купить сейчас</a>

                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <input type="hidden" value="{{ $product->name }}" name="name">
                    <input type="hidden" value="{{ $product->price }}" name="price">
                    <input type="hidden" value="{{ $product->image }}" name="image">
                    <input type="hidden" value="1" name="quantity">
                    <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 
                        0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>