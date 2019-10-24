@extends('layouts.app')

@section('page_title', "Корзина")

@section('content')

    <h1>Корзина</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(count($cart))
        <form method="post" action="{{route('user.order.create')}}">
            <div class="row">
                <div class="col-md-9">

                    @csrf
                    @php $colors = config('services.colors'); @endphp
                    @php $sizes = config('services.sizes'); @endphp
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Наименование товара</th>
                            {{--<th></th>--}}
                            <th>Количество</th>
                            <th>Дополнительно</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $total = 0; @endphp
                        @php $product_count = 0; @endphp
                        @foreach($cart as $key => $product)
                            @php if(!isset($products[$product['id']])) continue; @endphp
                            <tr>
                                <td>
                                    <a target="_blank"
                                       href="{{route('products.show', $product['id'])}}">
                                        @if(isset($products[$product['id']]['images'][0]))
                                            <img class="img-fluid" style="width: 80px"
                                                 src="/storage{{$products[$product['id']]['images'][0]['path']}}/sm/{{$products[$product['id']]['images'][0]['name']}}.{{$products[$product['id']]['images'][0]['ext']}}">
                                        @else
                                            <img class="img-fluid" style="width: 80px"
                                                 src="http://www.scppa.org/image.axd?picture=/2018/04/photo_not_available.png">
                                        @endif
                                    </a>
                                </td>
                                <td>
                                    <input type="hidden" name="id[]" value="{{$product['id']}}">
                                    <a target="_blank" title="{{$products[$product['id']]['name']}}"
                                       href="{{route('products.show', $product['id'])}}">
                                        {{$products[$product['id']]['name']}}
                                    </a>
                                    @if($products[$product['id']]['available'])
                                        {{--<span class="badge badge-primary">В наличии</span>--}}
                                    @else
                                        <span class="badge badge-danger">Предзаказ</span>
                                    @endif
                                    <br/>
                                    @php
                                    $cost = $products[$product['id']]['cost'];
                                    $is_sale = $products[$product['id']]->is_sale;
                                    if($is_sale) $cost = $products[$product['id']]->cost_with_sale;
                                    @endphp
                                    {{number_format($cost, 0, '.', ' ')}} RUB X <span
                                            class="product__qt-text">{{$product['qt']}}</span>
                                    @if($is_sale)
                                        <br/><span style="text-decoration: line-through">{{$products[$product['id']]['cost']}}
                                            RUB</span>
                                        Скидка {{ $products[$product['id']]['sale_percent'] }}%
                                    @endif
                                    @php $total += $cost * $product['qt']; @endphp
                                </td>
                                {{--<td>--}}
                                {{----}}
                                {{--</td>--}}
                                <td>
                                    <div class="input-group">
                                        <input type="hidden" name="key[]" class="product__key" value="{{$key}}">
                                        <input type="hidden" name="cost[]" class="product__cost" value="{{$cost}}">
                                        <input type="button" value="-" class="product__qt-minus btn">
                                        <input aria-label="qt" data-action="{{route('user.cart.update', $key)}}" type="text"
                                               pattern="\d+" value="{{$product['qt']}}"
                                               name="qt[]"
                                               class="product__qt form-control text-center"
                                               min="1" required="">
                                        <input type="button" value="+" class="product__qt-plus btn">
                                    </div>
                                </td>
                                <td>
                                    <input type="hidden" name="color[]" value="{{$product['color']}}">
                                    @if($product['color'])
                                        Цвет: {{$colors[$product['color']]}}
                                    @endif
                                    <input type="hidden" name="size[]" value="{{$product['size']}}">
                                    @if($product['size'])
                                        <br/>Размер: {{$sizes[$product['size']]}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.cart.delete', $key)}}" class="btn btn-link">Удалить</a>
                                </td>
                            </tr>
                            @php $product_count += $product['qt']; @endphp
                        @endforeach
                        </tbody>
                    </table>
                    <style>
                        .table td {
                            vertical-align: middle;
                        }
                    </style>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Сумма заказа
                        </div>
                        <div class="card-body  text-right">
                            <h4 class="card-title">
                                <div id="product__total">
                                    <b>Итого:</b>
                                    <span>{{number_format($total, 0, '.', ' ')}}</span> RUB
                                    <input type="hidden" value="{{$total}}">
                                </div>
                            </h4>
                            <p class="card-text">товаров: <span id="product__cart-qt">{{$product_count}}</span></p>
                            <button type="submit" class="btn btn-success">Перейти к оформлению</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="row">
            <div class="col-md-12">
                <p>В вашей корзине пока ничего нет</p>
            </div>
        </div>
    @endif
@endsection

