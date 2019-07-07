@extends('layouts.app')

@section('title', "Оформление заказа")

@section('content')

    <h1>Оформление заказа</h1>

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
        <form method="post" action="{{route('user.order.store')}}">
            @csrf
            <div class="row">
                <div class="col-md-9">
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
                    @php
                    $total = 0;
                    $product_count = 0;
                    $sale_total = 0;
                    @endphp
                    @foreach($cart as $key => $product)
                        @php
                        if(!isset($products[$product['id']])) continue;
                        $cost = $products[$product['id']]['cost'];
                        $is_sale = $products[$product['id']]->is_sale;
                        if($is_sale){
                        $cost = $products[$product['id']]->cost_with_sale;
                        $sale_total += $products[$product['id']]->sale;
                        }
                        $total += $cost * $product['qt'];
                        $product_count += $product['qt'];
                        @endphp
                    @endforeach
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Сумма заказа
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <div id="product__total">
                                    <b>Итого:</b>
                                    <span>{{number_format($total, 0, '.', ' ')}}</span> руб.
                                    <input type="hidden" value="{{$total}}">
                                </div>
                            </h4>
                            <div class="card-text">
                                <p>товаров: <span id="product__cart-qt">{{$product_count}}</span></p>
                                <p>скидка: <span id="product__cart-sale">{{$sale_total}} руб.</span></p>
                            </div>
                            <label>
                                <input type="checkbox" required name="agree" value="1">
                                Я согласен с условиями Публичной оферты
                            </label>
                            <button type="submit" class="btn btn-success">Перейти к оформлению</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection