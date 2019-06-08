@extends('layouts.app')

@section('title', "User Orders")


@section('content')
    <div class="col-md-12">
        <h3 class="text-center">Мои заказы</h3>
        @if(count($orders))
            @foreach($orders as $order)
{{--                {{dd($order->items)}}--}}
                <div class="row">
                    <div class="col-md-2">
                        {{$order['created_at']}}
                    </div>
                    <div class="col-md-2">
                        {{$order['email']}}
                    </div>
                    <div class="col-md-2">
                        {{$order['phone']}}
                    </div>
                    <div class="col-md-1">
                        {{$order['status']}}
                    </div>
                    <div class="col-md-5">
                        {{$order['address']}}
                    </div>
                </div>
                @foreach($order->items as $item)
                    <div class="col-md-12">
                        {{$item['pid']}}
                    </div>
                @endforeach
            @endforeach
        @else
            <div class="row">
                <div class="col-md-12">
                    Не найдено
                </div>
            </div>
        @endif
    </div>
@endsection