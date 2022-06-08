<footer class="bg-white p-6 sm:border-0 border-t">
    <div class="flex container justify-between">
        <div class="mb-6 md:mb-0">
            <a href="/" class="flex items-center">
                <img src="{{ asset('logo.svg') }}" class="mr-3 h-12" alt="Goodshop логотип" />
                <span class="self-center text-2xl font-medium whitespace-nowrap">Goodshop</span>
            </a>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Ссылки</h2>
            <div class="grid grid-cols-1 gap-6">
                <ul class="text-gray-600 ">
                    <li class="mb-4">
                        <a href="/" class="hover:underline">Главная</a>
                    </li>
                    <li>
                        <a href="{{ route('products.list') }}" class="hover:underline">Каталог</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm text-gray-600 sm:text-center">© 2022 <span>Goodshop™</span>. Все права защищены.
        </span>
    </div>
</footer>