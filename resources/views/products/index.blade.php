<x-app-layout>
    <section class="container">
        <h3 class="text-2xl font-medium text-left text-gray-700 mb-2">Список товаров</h3>
        <div class="flex mt-6 gap-4 justify-between relative min-w-full">
            <div class="p-3 bg-white rounded-md border shadow-md not-sr-only w-full max-w-sm">
                <form action="{{ route('products.list') }}" class="flex-auto flex flex-col h-full">
                    <h3 class="text-center text-lg font-medium text-gray-700">Фильтры</h3>
                    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root border-t">
                            <button type="button" x-description="Expand/collapse section button" class="py-3 bg-white w-full flex
                             items-center justify-between text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                                <span class="font-medium text-gray-900">
                                    Категории
                                </span>
                                <span class="ml-6 flex items-center">
                                    <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state.
                                    Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state.Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;">
                                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </button>
                        </h3>
                        <div class="pt-6" x-description="Filter section, show/hide based on section state." id="filter-section-0" x-show="open" style="display: none;">
                            <div class="space-y-4">
                                <div class="flex justify-start flex-col">
                                    @foreach ($categories as $category)
                                    <div class="item">
                                        <input id="filter-category-{{$category->id}}" name="category[]" value="{{ $category->id }}" type="checkbox" class="h-4 w-4 border-gray-300
                                     rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-{{$category->id}}" class="ml-3 text-sm text-gray-600">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                            <button type="button" x-description="Expand/collapse section button" class="py-3 bg-white w-full flex
                            items-center justify-between text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                                <span class="font-medium text-gray-900">
                                    Сортировка
                                </span>
                                <span class="ml-6 flex items-center">
                                    <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state.
                                    Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state.Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;">
                                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </button>
                        </h3>
                        <div class="pt-6" x-description="Filter section, show/hide based on section state." id="filter-section-0" x-show="open" style="display: none;">
                            <div class="space-y-4">
                                <div class="flex justify-start flex-col">
                                    <div class="item">
                                        <input name="order" id="order-1" value="price_asc" type="radio" class="form-check-input appearance-none rounded-full h-4 w-4 border
                                         border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1
                                          align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                                        <label for="order-1" class="ml-3 text-sm text-gray-600">
                                            Сначала недорогие
                                        </label>
                                    </div>
                                    <div class="item">
                                        <input name="order" id="order-2" value="price_desc" type="radio" class="form-check-input appearance-none rounded-full h-4 w-4 border
                                         border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1
                                          align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                                        <label for="order-2" class="ml-3 text-sm text-gray-600">
                                            Сначала дорогие
                                        </label>
                                    </div>
                                    <div class="item">
                                        <input name="order" id="order-4" value="name_asc" type="radio" class="form-check-input appearance-none rounded-full h-4 w-4 border
                                         border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1
                                          align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                                        <label for="order-4" class="ml-3 text-sm text-gray-600">
                                            По наименованию
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="filters row">
                            <div class="col-sm-6 col-md-3">
                                <label for="price_from">@lang('main.price_from')
                                    <input class="text-sm text-gray-900 bg-gray-50 rounded-lg border
                     border-gray-300 focus:ring-blue-500 focus:border-blue-500" type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                                </label>
                                <label for="price_to">@lang('main.to')
                                    <input class="text-sm text-gray-900 bg-gray-50 rounded-lg border
                     border-gray-300 focus:ring-blue-500 focus:border-blue-500" type="text" name="price_to" id="price_to" size="6" value="{{ request()->price_to }}">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex-col flex gap-4 mt-auto">
                        <x-button class="bg-indigo-400 justify-center">Применить</x-button>
                        <a href="{{ route('products.list') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                         font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                          focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 justify-center">Сбросить</a>
                    </div>

                </form>
            </div>
            <div class="grid gap-6 grid-cols-3">
                @forelse ($products as $product)
                <div class="w-full flex flex-col bg-white overflow-hidden rounded-md shadow-lg border">
                    <a href="{{ route('products.show', ['product' => $product->id]) }}" target="_blank" class="flex justify-center pt-1 border-b">
                        <img src="{{ url($product->image) }}" alt="" class="w-auto max-h-60">
                    </a>
                    <div class="px-4 py-3 flex flex-col flex-auto">
                        <a class="mb-2 border-b" href="{{ route('products.show', ['product' => $product->id]) }}">
                            <h3 class="text-gray-900 font-bold text-lg">{{ $product->name }}</h3>
                            {{ $product->category->name }}
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
                                <button class="px-4 py-2 bg-gray-800 text-white text-xs font-bold float-right uppercase rounded">Добавить в корзину</button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <div class="grid grid-flow-col">
                    <p>Извините, в настоящее время нет товаром соответствующих вашим данным!</p>
                </div>
                @endforelse
            </div>
        </div>
        <br>
        {{ $products->links('pagination::tailwind') }}
        <br>
    </section>
</x-app-layout>