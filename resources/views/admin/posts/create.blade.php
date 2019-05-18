@extends('layouts.admin')

@section('title', 'Публикации')

@section('content')
    <div class="row">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить публикацию</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.posts.create')}}">
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
                            <input type="text" name="name" class="form-control" id="name" placeholder="Введите название"
                                   value="{{ old('name', $post->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="vendor_code">Код</label>
                            <input type="text" name="vendor_code" class="form-control" id="vendor_code"
                                   placeholder="Введите Код"
                                   value="{{ old('vendor_code', $post->vendor_code) }}">
                        </div>
                        <div class="form-group">
                            <label for="collection">Коллекция</label>
                            <input type="text" name="collection" class="form-control" id="collection"
                                   placeholder="Введите коллекцию"
                                   value="{{ old('collection', $post->collection) }}">
                        </div>
                        <div class="form-group">
                            <label for="vendor_code">Штрих-код</label>
                            <input type="text" name="barcode" class="form-control" id="barcode"
                                   placeholder="Введите штрих-код"
                                   value="{{ old('barcode', $post->barcode) }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Стоимость</label>
                            <input type="number" name="price" class="form-control" id="price"
                                   placeholder="Введите стоимость" autocomplete="off"
                                   value="{{ old('price', $post->price) }}">
                        </div>
                        <div class="form-group">
                            <label for="desc">Описание</label>
                        <textarea name="desc" class="form-control" id="desc"
                                  placeholder="Харектеристика">{{ old('desc', $post->desc) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">Фото</label>
                            <input type="file" name="img" id="img">
                            <p class="help-block">Максимальный размер 3 Мб</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input @if($post->status) checked @endif name="status" value="true" type="checkbox">
                                Активный
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
        </div>
    </div>

@endsection