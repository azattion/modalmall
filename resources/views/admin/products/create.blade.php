@extends('layouts.admin')

@section('title', 'Добавить товар')

@section('content')
        <!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Quick Example</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{url('products')}}">
        {{ csrf_field() }}
        <div class="box-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" placeholder="Введите название" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="price">Стоимость</label>
                <input type="text" class="form-control" id="price" placeholder="Введите стоимость" {{ old('price') }}>
            </div>
            <div class="form-group">
                <label for="desc">Описание</label>
                <textarea class="form-control" id="desc">{{ old('desc') }}</textarea>
            </div>
            <div class="form-group">
                <label for="photo">Фото</label>
                <input type="file" id="photo">
                <p class="help-block">Максимальный размер 3 Мб</p>
            </div>
            <div class="checkbox">
                <label>
                    <input name="status" type="checkbox"> Активный
                </label>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>
<!-- /.box -->

@endsection