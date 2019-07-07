@extends('layouts.app')

@section('page_title', "Cabinet")

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
            <form method="post" action="{{route('user.settings.password')}}">
                @csrf
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input required name="password" value="{{old('password')}}" type="password"
                           class="form-control @error('password') is-invalid @enderror" id="password"
                           placeholder="Введите текущий пароль">
                </div>
                <div class="form-group">
                    <label for="new-password">Новый пароль</label>
                    <input required name="new-password" type="password"
                           class="form-control @error('new-password') is-invalid @enderror" id="new-password"
                           placeholder="Введите новый пароль">
                </div>
                <div class="form-group">
                    <label for="new-password2">Новый пароль еще раз</label>
                    <input required name="new-password_confirmation" type="password"
                           class="form-control @error('new-password_confirmation') is-invalid @enderror" id="new-password_confirmation"
                           placeholder="Введите новый пароль еще раз">
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection