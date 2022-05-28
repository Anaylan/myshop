<x-app-layout>
    <div class="container px-6 mx-auto">
        <h1 class=" text-2xl font-extrabold">Корзина</h1>
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 rounded-lg bg-white shadow-lg">
                <div class="flex-1">
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
                                        <form action="{{ route('cart.update') }}" class="flex gap-2 border items-center rounded-md shadow-sm" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id}}">

                                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                            <input id="qty" type="number" value='{{$item->quantity}}' name="quantity" class="border-0 w-14 text-center text-gray-700 bg-inherit outline-none focus:outline-none hover:text-black focus:text-black" />
                                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
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
                                <a href="{{url('/payments')}}">
                                    <button class="flex rounded-lg justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                        </svg>
                                        <span class="ml-2 mt-5px">Перейти к оформлению</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $("#qty").change(function() {
            input = document.getElementById("qty")
            console.log(input.value)
        });
    </script>
</x-app-layout>