@extends('layouts.admin')

@section('title', 'Товары')

@section('content')
    <div class="row">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить товар</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{url('admin/products')}}">
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
                                   value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input @if($product->status) checked @endif name="status" value="true" type="checkbox">
                                Активный
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="vendor_code">Код</label>
                                    <input type="text" name="vendor_code" class="form-control" id="vendor_code"
                                           placeholder="Введите Код"
                                           value="{{ old('vendor_code', $product->vendor_code) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="vendor_code">Штрих-код</label>
                                    <input type="text" name="barcode" class="form-control" id="barcode"
                                           placeholder="Введите штрих-код"
                                           value="{{ old('barcode', $product->barcode) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="collection">Коллекция</label>
                                    <input type="text" name="collection" class="form-control" id="collection"
                                           placeholder="Введите коллекцию"
                                           value="{{ old('collection', $product->collection) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Стоимость</label>
                                    {{--<input type="number" name="price" class="form-control" id="price"--}}
                                    {{--placeholder="Введите стоимость" autocomplete="off"--}}
                                    {{--value="{{ old('price', $product->price) }}">--}}
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" name="price" class="form-control" id="price"
                                               placeholder="Введите стоимость" autocomplete="off"
                                               value="{{ old('price', $product->price) }}">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cat">Категория</label>
                                    <select name="cat" class="form-control" id="cat">
                                        @foreach($categories as $key => $category)
                                            <option value="{{$key}}">{{$category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sex">Пол</label>
                                    <select name="sex" class="form-control" id="sex">
                                        @foreach($sex as $key => $s)
                                            <option value="{{$key}}">{{$s}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc">Описание</label>
                        <textarea rows="5" name="desc" class="form-control wysihtml5" id="desc"
                                  placeholder="Харектеристика">{{ old('desc', $product->desc) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">Фотографии</label>
                            <input accept="image/*" type="file" name="img[]" id="img">
                            <p class="help-block">Максимальный размер 3 Мб</p>
                        </div>

                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Поисковая оптимизация</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="display: none;">
                                <div class="form-group">
                                    <label for="meta_title">Заголовок</label>
                                    <input type="text" name="meta_title" class="form-control" id="meta_title"
                                           placeholder="Введите название"
                                           value="{{ old('meta_title', $product->meta_title) }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_desc">Описание</label>
                        <textarea name="meta_desc" class="form-control" id="meta_desc"
                                  placeholder="Харектеристика">{{ old('meta_desc', $product->meta_desc) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">Ключевые слова</label>
                                    <input type="text" name="meta_keywords" class="form-control" id="meta_keywords"
                                           placeholder="Введите ключевые слова"
                                           value="{{ old('meta_keywords', $product->meta_keywords) }}">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Сохранить</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection