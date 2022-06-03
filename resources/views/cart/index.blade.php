<x-app-layout>
    <div class="container px-6 mx-auto">
        <h1 class="text-2xl font-extrabold">Корзина</h1>
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 rounded-lg bg-white shadow-lg">
                <div class="flex-1">
                    @if (isset($cartItems))

                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Наименование</th>
                                <th class="lg:text-right text-left pl-5 lg:pl-0">
                                    <span class="hidden lg:inline">Количество</span>
                                </th>
                                <th class="hidden text-right md:table-cell">Цена за штуку</th>
                                <th class="text-right">Итого</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($cartItems as $item)
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button type="submit" class="text-gray-700 md:ml-4">
                                                <small>(Удалить)</small>
                                            </button>
                                        </form>

                                    </a>
                                </td>
                                <td class="justify-center mt-6 md:justify-end md:flex">
                                    <div class="flex flex-row justify-end h-8">
                                        <form action="{{ route('cart.update') }}" method="post" class="my-auto">
                                            @csrf
                                            <div class="relative">
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" class=" block p-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Поиск по сайту" required>
                                                <button type="submit" class="text-white absolute right-1.5 px-3 py-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm">Подтвердить</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                    <span class="text-sm font-medium lg:text-base">
                                        {{ $item->price }} &#8381;
                                    </span>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        {{ $item->price * $item->quantity}} &#8381;
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr class="pb-6 mt-6">
                    <div class="my-4 mt-6 -mx-2 flex">
                        <div class="px-2 w-full">
                            <div class="p-4 bg-gray-100 rounded border">
                                <h1 class="ml-2 font-bold uppercase">Детали заказа</h1>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between pt-4 border-b">
                                    <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Всего
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        {{ Cart::getTotal() }} &#8381;
                                    </div>
                                </div>
                                <form action="{{route('cart.checkout')}}" method="post">
                                    @csrf
                                    <button class="flex rounded-lg justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                        </svg>
                                        <span class="ml-2 mt-5px">Перейти к оформлению</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @else
                    <h4 class="text-2xl font-medium text-slate-700">Корзина пуста</h4>
                    <p class="text-lg">Воспользуйтесь поиском, чтобы найти всё что нужно.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>