<x-app-layout>
    <div class="max-w-7xl mx-auto px-8">
        <div class="bg-white p-3 overflow-hidden shadow-sm sm:rounded-lg">
            <h4 class="text-2xl font-medium text-left text-gray-700 mb-2">История заказов</h4>

            @if (!isset($orders))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <ul class="">
                    @foreach($orders as $order)
                    <li class="border-b border-gray-400 last:border-b-0">
                        <div class="card">
                            <div class="bg-gray-200 px-4 py-2">
                                Заказ номер：{{ $order->id }}
                                <span class="float-right">{{ $order->created_at->format('Y-m-d H:i:s') }}</span>
                            </div>
                            <div class="card-body">
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-slate-100">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Название продукта
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Цена за шт.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Количество
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Итого
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Cостояние
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Действия
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $index => $item)
                                        <tr>
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                <span class="product-title">
                                                    <a target="_blank" href="{{ route('products.show', [$item->product_id]) }}">{{ $item->product->name }}</a>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">{{ $item->price }} &#8381</td>
                                            <td class="px-6 py-4 text-center">{{ $item->quantity }}</td>
                                            @if($index === 0)
                                            <td rowspan="{{ count($order->items) }}" class="px-6 py-4 whitespace-nowrap">{{ $order->amount }} &#8381</td>
                                            <td rowspan="{{ count($order->items) }}" class="px-6 py-4">
                                                @if($order->paid_at)
                                                @if($order->refund_status === \App\Models\Order::REFUND_STATUS_PENDING)
                                                Оплачено
                                                @else
                                                {{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}
                                                @endif
                                                @elseif($order->closed)
                                                Закрыт
                                                @else
                                                Неоплачено<br>
                                                Пожалуйста оплатите заказ до {{ $order->created_at->addSeconds(config('app.order_ttl')) }}. В противном случае заказ будет закрыт автоматически.
                                                @endif
                                            </td>
                                            <td rowspan="{{ count($order->items) }}" class="text-center">
                                                <a class="btn btn-primary btn-sm" href="{{ route('orders.show', ['order' => $order->id]) }}">Проверить заказ</a>
                                                <!-- 评价入口开始 -->
                                                @if($order->paid_at)
                                                <a class="btn btn-success btn-sm" href="{{ route('orders.review.show', ['order' => $order->id]) }}">
                                                    {{ $order->reviewed ? 'Посмотреть отзывы' : 'Evaluation' }}
                                                </a>
                                                @endif
                                                <!-- 评价入口结束 -->
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @else
            <p class="py-3 text-lg">В данный момент вы не сделали ни одного заказа.</p>
            @endif

            <div class="float-right">{{ $orders->render() }}</div>

        </div>
    </div>
</x-app-layout>