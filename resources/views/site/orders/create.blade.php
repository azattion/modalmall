@extends('layouts.app')

@section('page_title', "Оформление заказа")

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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input name="name" required value="{{old('name', auth()->user()['name'])}}"
                                       class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                                       placeholder="Введите ваше имя">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="surname">Фамилия</label>
                                <input name="surname" required value="{{old('surname', auth()->user()['surname'])}}"
                                       class="form-control @error('surname') is-invalid @enderror" type="text"
                                       id="surname"
                                       placeholder="Введите вашу фамилию">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Номер телефона</label>
                                <input name="phone" required value="{{old('phone', auth()->user()['phone'])}}"
                                       class="form-control @error('phone') is-invalid @enderror" type="text" id="phone"
                                       placeholder="Введите номер телефона">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Электронная почта</label>
                                <input name="email" required value="{{old('email', auth()->user()['email'])}}"
                                       type="email"
                                       class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Введите электронную почту">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="delivery_type">Служба доставки</label>
                                <select required class="form-control" name="delivery" id="delivery_type">
                                    @php $delivery_type = config('services.delivery_type'); @endphp
                                    @foreach($delivery_type as $key => $type)
                                        <option value="{{$key}}">{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Оформить заказ</button>
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
                                @if($sale_total)
                                    <p>скидка: <span id="product__cart-sale">{{$sale_total}} руб.</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection