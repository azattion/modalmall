@extends('layouts.app')

@section('page_title', 'Мои заказы')

@section('content')
    <div class="col-md-12">
        <h1>Мои заказы</h1>
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Наименование товара</th>
                <th>Дополнительно</th>
                <th></th>
                <th>Статус заказа</th>
            </tr>
            </thead>
            <tbody>
            @php
            $colors = config('services.colors');
            $sizes = config('services.sizes');
            @endphp
            @if(count($orders))
                @foreach($orders as $order)
                    @php $cost = 0; @endphp
                    @foreach($order->items as $item)
                        @php $cost += $item['cost'] * $item['qt']; @endphp
                    @endforeach
                    <tr style="background-color: #fff">
                        <td></td>
                        <td>
                            <span class="info-subtitle">Заказ №:</span> <span
                                    class="info-body">{{$order['id']}}</span><br>
                            <span class="info-subtitle">Время заказа:</span> <span
                                    class="info-body">{{$order['created_at']}}</span>
                        </td>
                        <td>
                            @php $statues = config('services.order_status'); @endphp
                            <span class="info-subtitle">Статус:</span><br/>
                            <span class="info-body">{{$statues[$order['status']]}}</span>
                        </td>
                        <td><span class="info-subtitle">Итого:</span><br/> <span class="info-body">{{number_format($cost, 0, '.', ' ')}}
                                руб.</span></td>
                        <td></td>
                    </tr>
                    @foreach($order->items as $item)
                        <tr>
                            <td class="text-center">
                                @if(isset($item->product->images[0]))
                                    <img style="width: 50px"
                                         src="/storage{{$item->product->images[0]['path']}}/sm/{{$item->product->images[0]['name']}}.{{$item->product->images[0]['ext']}}">
                                @else
                                    <img class="img-fluid" style="width: 50px"
                                         src="/img/image-404.png">
                                @endif
                            </td>
                            <td>
                                <a title="{{$item->product['name']}}" target="_blank"
                                   href="{{route('products.show', $item['pid'])}}">
                                    {{$item->product['name']}}
                                </a>
                                <div>{{number_format($item['cost'], 0, '.', ' ')}} руб. X {{$item['qt']}}</div>
                            </td>
                            <td>
                                @if($item['color'])
                                    <div>Цвет: {{$colors[$item['color']]}}</div>
                                @endif
                                @if($item['size'])
                                    <div>Размер: {{$sizes[$item['size']]}}</div>
                                @endif
                            </td>
                            <td></td>
                            <td>
                                @if($item['status'] == 2)
                                    <span class="badge badge-danger">Предзаказ</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        <div>У вас пока заказов нет</div>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div>
            <div class="no-margin pull-right">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection