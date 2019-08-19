@extends('layouts.app')

@section('page_title', "Личный кабинет")

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Личный кабинет</h1>
        </div>
        <div class="col-md-6 text-right">
            <form method="post" action="{{route('logout')}}">
                @csrf
                <button class="btn btn-link" type="submit">Выйти</button>
            </form>
        </div>
        <div class="col-md-4 text-center">
            <div class="cabinet-card">
                <a class="cabinet-card__link" href="{{route('user.settings')}}">
                    <img class="cabinet-card__img img-fluid" src="/img/settings-icon.png" alt="Мои данные">
                    <br/>
                    <span class="cabinet-card__name">Мои данные</span>
                </a>
                <div class="cabinet-card__additional">
                    <a href="{{route('user.settings')}}" class="cabinet-card__additional-link text-uppercase">Изменить</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="cabinet-card">
                <a class="cabinet-card__link" href="{{route('user.cart.index')}}">
                    <img class="cabinet-card__img img-fluid" src="/img/cart.png" alt="Корзина">
                    <br/>
                    <span class="cabinet-card__name">   Корзина</span>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="cabinet-card">
                <a class="cabinet-card__link" href="{{route('user.order.index')}}">
                    <img class="cabinet-card__img img-fluid" src="/img/orders-icon.png" alt="История заказов">
                    <br/>
                    <span class="cabinet-card__name">История заказов</span>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="cabinet-card">
                <a class="cabinet-card__link" href="{{route('user.favorite.index')}}">
                    <img class="cabinet-card__img img-fluid" src="/img/favorite-icon.png" alt="Избранные">
                    <br/>
                    <span class="cabinet-card__name"> Избранные</span>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="cabinet-card">
                <a class="cabinet-card__link" href="{{route('user.review.index')}}">
                    <img class="cabinet-card__img img-fluid" src="/img/reviews-icon.png" alt="Мои отзывы">
                    <br/>
                    <span class="cabinet-card__name">Мои отзывы</span>
                </a>
            </div>
        </div>

    </div>
@endsection