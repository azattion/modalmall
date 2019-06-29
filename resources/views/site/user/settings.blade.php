@extends('layouts.app')

@section('title', "Cabinet")

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{route('user.settings')}}">
                            Мои данные
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('user.settings.password')}}">
                            Пароль
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('user.settings')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Электронная почта</label>
                    <input name="email" disabled value="{{old('email', auth()->user()['email'])}}"
                           class="form-control @error('email') is-invalid @enderror" type="text" id="email"
                           placeholder="Введите ваше имя">
                </div>
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input name="name" value="{{old('name', auth()->user()['name'])}}"
                           class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                           placeholder="Введите ваше имя">
                </div>
                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input name="surname" value="{{old('surname', auth()->user()['surname'])}}"
                           class="form-control @error('surname') is-invalid @enderror" type="text" id="surname"
                           placeholder="Введите вашу фамилию">
                </div>
                <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input name="phone" value="{{old('phone', auth()->user()['phone'])}}"
                           class="form-control @error('phone') is-invalid @enderror" type="text" id="phone"
                           placeholder="Введите ваш номер телефона">
                </div>
                <div class="form-group">
                    <label for="address">Адрес доставки</label>
                    <input name="address" value="{{old('address', auth()->user()['address'])}}"
                           class="form-control @error('address') is-invalid @enderror" type="text" id="address"
                           placeholder="Введите ваш адрес">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input required name="password" value="{{old('password')}}" type="password"
                           class="form-control @error('password') is-invalid @enderror" id="password"
                           placeholder="Введите текущий пароль">
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection