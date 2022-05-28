<nav x-data="{ open: false }" class="bg-white z-50 sticky border-b shadow border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="container mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center py-3">
                    <a href="/">
                        <img src="{{ asset('logo.svg') }}" alt="Goodshop" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 -my-px ml-10 flex">
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
            <x-input>
            </x-input>
            <div class="-my-px flex">
                <x-cart :href="route('cart.list')" :active="request()->routeIs('cart.list')">
                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    {{ Cart::getTotalQuantity()}}
                </x-cart>
            </div>
            <div class="flex items-center ml-6">
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
                        <x-dropdown-link :href="route('dashboard')">
                            {{ __('Личный кабинет') }}
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
                <div>
                    @if (Route::has('login'))
                    <a href="{{route('login')}}" class="inline-flex items-center h-fit self-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 \
                    hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out">
                        Войти
                    </a>

                    @if (Route::has('register'))
                    <a href="{{route('register')}}" class="inline-flex items-center h-fit self-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 \
                    hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out">
                        Зарегистрироваться
                    </a>
                    @endif
                    @endif
                    @endif
                </div>
            </div>

            <!-- Hamburger -->

        </div>
    </div>

    <!-- Responsive Navigation Menu -->

</nav>