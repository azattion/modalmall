@extends('layouts.app')

@section('title', "Cart")

{{--{{dd($cart)}}--}}
@section('content')
    @if(count($cart))
        <form method="post" action="{{route('site.products.order')}}">
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

