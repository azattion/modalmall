@extends('layouts.app')

@section('title', "User Orders")

@section('content')
    <div class="col-md-12">
        <h3 class="text-center">Мои заказы</h3>
        @if(count($orders))
            @foreach($orders as $order)
                <div class="row">
                    <div class="col-md-3">
                        {{$order['email']}}
                    </div>
                    <div class="col-md-3">
                        {{$order['phone']}}
                    </div>
                    <div class="col-md-3">
                        {{$order['address']}}
                    </div>
                </div>
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