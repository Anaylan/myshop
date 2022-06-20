<x-app-layout>
    <x-slot name="title">Каталог</x-slot>
    <section x-data="{ open: false }" class="container">
        <div class="flex justify-between">
            <h3 class="text-2xl font-medium text-left text-gray-700 mb-2">Список товаров</h3>
            <button @click="open = ! open" class="inline-flex border border-gray-300 items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-filter"></i>
            </button>
            <div :class="{'block': open, 'hidden': !open}" class="fixed bg-white z-50 right-0 top-0 w-1/2 border h-screen shadow">
                <div class="flex flex-auto flex-col h-full">
                    <div class="h-fit p-3 justify-end">
                        <button @click="open = ! open" class="inline-flex border border-gray-300 items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <i class="fas fa-close"></i>
                        </button>
                    </div>
                    <div class="flex-auto pb-3">
                        <h3 class="text-left px-4 text-xl font-medium text-gray-700">Фильтры</h3>
                        <form action="{{ route('products.list') }}" class="flex flex-col h-full px-5 pb-10">
                            <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root border-t">
                                    <button type="button" x-description="Expand/collapse section button" class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
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
                                                <input id="filter-category-{{$category->id}}" name="category_id" value="{{ $category->id }}" type="checkbox" class="h-4 w-4 border-gray-300
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
                                            <select name="order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                <option value="">Сортировать по</option>
                                                <option value="price_asc">Сначала недорогие</option>
                                                <option value="price_desc">Сначала дорогие</option>
                                                <option value="name_asc">По наименованию</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                    <button type="button" x-description="Expand/collapse section button" class="py-3 bg-white w-full flex
                            items-center justify-between text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                                        <span class="font-medium text-gray-900">
                                            Цена
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
                                <div class="pt-6 self-center" id="filter-section-2" x-show="open" style="display: none;">
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
                            <div class="flex-col flex gap-3 mt-auto">
                                <x-button class="bg-indigo-400 justify-center">Применить</x-button>
                                <a href="{{ route('products.list') }}" class="flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                         font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                          focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 justify-center">Сбросить</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex mt-6 gap-4 justify-between relative">
            <div class="grid gap-6 xl:grid-cols-4 lg:grid-cols-2 md:grid-cols-3 grid-cols-2">
                @forelse ($products as $product)
                <div class="swiper-slide border rounded-md shadow-md overflow-hidden hover:-translate-y-6 duration-300 bg-white">
                    <div class="w-full max-w-sm mx-auto h-full">
                        <a class="flex z-50 items-end justify-end h-56 w-full bg-no-repeat border-b bg-contain bg-center" href="{{ route('products.show', ['product' => $product]) }}" style="background-image: url('{{asset($product->image)}}');">
                            <form action="{{ route('cart.store') }}" class="flex" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}" name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </a>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                            <form action="{{ route('products.list') }}">
                                <input type="hidden" value="{{ $product->category->id }}" name="category_id">
                                <button type="submit" class="text-md hover:underline duration-200">{{ $product->category->name }}</button>
                            </form>
                            <span class="text-gray-500 mt-2">{{$product->price}} &#8381;</span>
                        </div>
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