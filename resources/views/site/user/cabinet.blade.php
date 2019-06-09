@extends('layouts.app')

@section('title', "Cabinet")

@section('content')
    <div class="row">
        <div class="col-md-4 text-center">
            <a href="{{route('user.order.index')}}">
                <img class="img-fluid" src="/img/cabinet.png" alt="Личный кабинет">
                <br/>
                Заказы
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="{{route('user.favorite.index')}}">
                <img class="img-fluid" src="/img/cabinet.png" alt="Личный кабинет">
                <br/>
                Избранные
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="{{route('user.review.index')}}">
                <img class="img-fluid" src="/img/cabinet.png" alt="Личный кабинет">
                <br/>
                Отзывы
            </a>
        </div>
    </div>
@endsection