@extends('layouts.app')

@section('title', "Корзина")

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
        <div class="row">
            <div class="col-md-9">
                <form method="post" action="{{route('user.order.store')}}">
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
                                    {{number_format($cost, 0, '.', ' ')}} руб. X <span class="product__qt_text">{{$product['qt']}}</span>
                                    @if($is_sale)
                                        <br/><span style="text-decoration: line-through">{{$products[$product['id']]['cost']}} руб.</span>
                                        Скидка {{ $products[$product['id']]['sale_percent'] }}%
                                    @endif
                                    @php $total += $cost * $product['qt']; @endphp
                                </td>
                                {{--<td>--}}
                                    {{----}}
                                {{--</td>--}}
                                <td>
                                    {{--<input style="width: 100px" name="qt[{{$product['id']}}]" class="form-control"--}}
                                    {{--value="{{$product['qt']}}"--}}
                                    {{--type="number" min="1"--}}
                                    {{--step="1">--}}
                                    <div class="input-group">
                                        <input type="hidden" name="key[]" class="product__key" value="{{$key}}">
                                        <input type="hidden" name="cost[]" class="product__cost" value="{{$cost}}">
                                        <input type="button" value="-" class="product__qt-minus btn">
                                        <input data-action="{{route('user.cart.update', $key)}}" type="text" pattern="\d+" value="{{$product['qt']}}"
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
                            @php $product_count++; @endphp
                        @endforeach
                        </tbody>
                    </table>
                    <style>
                        .table td {
                            vertical-align: middle;
                        }
                    </style>
                    <div class="row hide">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Номер телефона</label>
                                <input name="phone" required value="{{old('phone', auth()->user()['phone'])}}"
                                       class="form-control @error('phone') is-invalid @enderror" type="phone" id="phone"
                                       placeholder="Введите номер телефона">
                            </div>
                            <div class="form-group">
                                <label for="email">Электронная почта</label>
                                <input name="email" required value="{{old('email', auth()->user()['email'])}}"
                                       type="email"
                                       class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Введите электронную почту">
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес доставки</label>
                                <input name="address" required value="{{old('address', auth()->user()['address'])}}"
                                       type="text"
                                       class="form-control @error('address') is-invalid @enderror" id="address"
                                       placeholder="Введите адрес доставки">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" required name="agree" value="1">
                                    Я согласен с условиями Публичной оферты
                                </label>
                            </div>
                            <button class="btn btn-success" type="submit">Оформить заказ</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Сумма заказа
                    </div>
                    <div class="card-body  text-right">
                        <h4 class="card-title">
                            <b>Итого:</b>
                            <span id="product__total">{{number_format($total, 0, '.', ' ')}}</span> руб.
                        </h4>
                        <p class="card-text">товаров: {{$product_count}}</p>
                        <a href="" class="btn btn-success">Перейти к оформлению</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <p>В вашей корзине пока ничего нет</p>
            </div>
        </div>
    @endif
@endsection

