@extends('layouts.admin')

@section('title', 'Бренды')

@section('content')
    <div class="row">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$brand->id?"Изменить":"Добавить"}} бренд</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data"
                      action="{{$brand->id ? route('admin.brands.update', $brand->id) : route('admin.brands.store')}}">
                    @csrf
                    @if($brand->id) @method('PUT') @endif
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
                        <div class="form-group @error('name') has-error @enderror">
                            <label for="name">Название</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Введите название"
                                   value="{{ old('name', $brand->name) }}">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input {{old('status', $brand->status)?'checked':''}} name="status" value="1"
                                       type="checkbox">
                                Активный
                            </label>
                        </div>
                        <div class="form-group @error('image') has-error @enderror">
                            <label for="image">Фотография</label>
                            <input accept="image/*" type="file" name="images[]" multiple id="image">
                            <p class="help-block">Максимальный размер 3 Мб</p>
                            @if($brand->images)
                                <div class="row">
                                    @foreach($brand->images as $image)
                                        <div class="col-sm-2">
                                            <a target="_blank"
                                               href="/public/storage{{$image['path']}}/lg/{{$image['name']}}.{{$image['ext']}}"><img
                                                        class="img-responsive"
                                                        src="/public/storage{{$image['path']}}/sm/{{$image['name']}}.{{$image['ext']}}"></a>
                                            <div class="checkbox"><label><input type="checkbox" value="{{$image['id']}}" name="image-del[{{$image['id']}}]"> Удалить</label></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="form-group @error('desc') has-error @enderror">
                            <label for="desc">Описание</label>
                        <textarea rows="5" name="desc" class="form-control wysihtml5" id="desc"
                                  placeholder="Введите описание бренда">{{ old('desc', $brand->desc) }}</textarea>
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
                                <div class="form-group @error('meta_title') has-error @enderror">
                                    <label for="meta_title">Заголовок</label>
                                    <input type="text" name="meta_title" class="form-control" id="meta_title"
                                           placeholder="Введите название"
                                           value="{{ old('meta_title', $brand->meta_title) }}">
                                </div>
                                <div class="form-group @error('meta_desc') has-error @enderror">
                                    <label for="meta_desc">Описание</label>
                        <textarea name="meta_desc" class="form-control" id="meta_desc"
                                  placeholder="Характеристика">{{ old('meta_desc', $brand->meta_desc) }}</textarea>
                                </div>
                                <div class="form-group @error('meta_keywords') has-error @enderror">
                                    <label for="meta_keywords">Ключевые слова</label>
                                    <input type="text" name="meta_keywords" class="form-control" id="meta_keywords"
                                           placeholder="Введите ключевые слова"
                                           value="{{ old('meta_keywords', $brand->meta_keywords) }}">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button style="margin-right: 10px;" name="save-2double" value="1" type="submit"
                                class="btn btn-default pull-left">Сохранить
                            и дублировать
                        </button>
                        <button name="save-2new" value="1" type="submit" class="btn btn-default pull-left">Сохранить и
                            новый
                        </button>
                        <button name="save-2list" value="1" type="submit" class="btn btn-primary pull-right">
                            <i class="fa fa-save"></i> Сохранить
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection