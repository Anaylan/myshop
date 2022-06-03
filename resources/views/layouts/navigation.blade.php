<nav x-data="{ open: false }" class="bg-white z-50 sticky border-b shadow border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="container mx-auto px-4">
        <div class="flex justify-between gap-5">
            <div class="flex gap-10">
                <!-- Logo -->
                <div class="shrink-0 flex items-center py-3">
                    <a href="/">
                        <img src="{{ asset('logo.svg') }}" alt="Goodshop" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="gap-8 -my-px flex min-w-max">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('Главная') }}
                    </x-nav-link>
                    <x-nav-link :href="route('blog.index')" :active="request()->routeIs('blog.index')">
                        {{ __('Новости') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products.list')" :active="request()->routeIs('products.list')">
                        {{ __('Магазин') }}
                    </x-nav-link>
                    @role('admin')
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                        {{ __('Управление') }}
                    </x-nav-link>
                    @endrole
                </div>

            </div>

            <!-- Settings Dropdown -->
            <form action="{{ route('products.list') }}" class="my-auto">
                <label for="search" class="text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input name="search" type="text" id="search" class="block w-96 p-3 pl-10 text-sm text-gray-900 bg-gray-50 rounded-lg border
                     border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Поиск по товарам..." required>
                    <button type="submit" class="text-white absolute right-1.5 px-3 py-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm">Искать</button>
                </div>
            </form>
            <div class="flex items-center min-w-max">
                <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                    @if (Auth::User())
                    <x-dropdown class="float-right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 
                        focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 
                                    0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('orders.index')">
                                {{ __('История заказов') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Выйти') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    @else
                    <div class="ml-auto flex items-center">
                        <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                            @if (Route::has('login'))
                            <a href="{{route('login')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800">
                                Войти
                            </a>
                            <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                            @if (Route::has('register'))
                            <a href="{{route('register')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800">
                                Зарегистрироваться
                            </a>
                            @endif
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
                <div class="ml-4 my-auto flow-root lg:ml-6">
                    <a href="{{ route('cart.list') }}" class="group -m-2 p-2 flex items-center">
                        <!-- Heroicon name: outline/shopping-bag -->
                        <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ Cart::getTotalQuantity()}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>