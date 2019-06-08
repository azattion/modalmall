@extends('layouts.app')

@section('title', "Cart")

{{--{{dd($cart)}}--}}
@section('content')
    @if(count($cart))
        <form method="post" action="{{route('site.products.order')}}">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{csrf_field()}}
            @foreach($cart as $key => $qt)
                <div class="row">
                    <div class="col-md-2">
                        <a target="_blank" href="{{route('site.products.product', $key)}}"> Товар {{$key}}</a>
                    </div>
                    <div class="col-md-1">
                        <input type="hidden" name="id" value="{{$key}}">
                        <input class="form-control" value="{{$qt}}" type="number" min="1"
                               step="1">
                    </div>
                    <div class="col-md-2"><a href="{{route('site.products.cart-del', $key)}}"
                                             class="btn btn-primary">Удалить</a>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" type="phone" id="phone" placeholder="Введите ваш номер телефона">
                    </div>
                    <div class="form-group">
                        <label for="email">Электронная почта</label>
                        <input name="email" value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Введите ваш номер телефона">
                    </div>
                    <div class="form-group">
                        <label for="address">Адрес доставки</label>
                        <input name="address" value="{{old('address')}}" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Введите адрес доставки">
                    </div>
                    <button class="btn btn-success" type="submit">Оформить заказ</button>
                </div>
            </div>
        </form>
    @else
        <div class="row">
            <div class="col-md-12">
                <p>Корзина пуста</p>
            </div>
        </div>
    @endif
@endsection

