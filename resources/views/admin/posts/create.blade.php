@extends('layouts.admin')

@section('title', 'Публикации')

@section('content')
    <div class="row">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$post->id?"Изменить":"Добавить"}} публикацию</h3>
                </div>
                <!-- /.box-header -->
                {{--                {{dd($post)}}--}}
                        <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data"
                      action="{{$post->id ? route('admin.posts.update', $post->id) : route('admin.posts.store')}}">
                    {{ csrf_field() }}
                    @if($post->id) @method('PUT') @endif
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
                        <div class="form-group @error('title') has-error @enderror">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" class="form-control" id="title"
                                   placeholder="Введите название"
                                   value="{{ old('title', $post->title) }}">
                        </div>
                        <div class="form-group @error('date') has-error @enderror">
                            <label for="date">Дата</label>
                            <input autocomplete="off" type="text" name="date" class="datepicker form-control" id="date"
                                   placeholder="Введите дату"
                                   value="{{ old('date', $post->date) }}">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input {{$post->status || old('status')?'checked':''}} name="status" value="1"
                                       type="checkbox">
                                Активный
                            </label>
                        </div>
                        <div class="form-group @error('images') has-error @enderror">
                            <label for="images">Фотография</label>
                            <input accept="image/*" type="file" name="images[]" id="images">
                            <p class="help-block">Максимальный размер 3 Мб</p>
                        </div>
                        <div class="form-group @error('keywords') has-error @enderror">
                            <label for="keywords">Ключевые слова</label>
                            <input type="text" name="keywords" class="form-control" id="keywords"
                                   placeholder="Введите ключевые слова" autocomplete="off"
                                   value="{{ old('keywords', $post->keywords) }}">
                        </div>
                        <div class="form-group @error('desc') has-error @enderror">
                            <label for="desc">Описание</label>
                        <textarea rows="5" name="desc" class="form-control" id="desc"
                                  placeholder="Характеристика">{{ old('desc', $post->desc) }}</textarea>
                        </div>
                        <div class="form-group @error('text') has-error @enderror">
                            <label for="desc">Текст</label>
                            <textarea rows="5" name="text" class="form-control wysihtml5" id="text"
                                      placeholder="Текст">{{ old('text', $post->text) }}
                            </textarea>
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
                                           value="{{ old('meta_title', $post->meta_title) }}">
                                </div>
                                <div class="form-group @error('meta_desc') has-error @enderror">
                                    <label for="meta_desc">Описание</label>
                        <textarea name="meta_desc" class="form-control" id="meta_desc"
                                  placeholder="Характеристика">{{ old('meta_desc', $post->meta_desc) }}</textarea>
                                </div>
                                <div class="form-group @error('meta_keywords') has-error @enderror">
                                    <label for="meta_keywords">Ключевые слова</label>
                                    <input type="text" name="meta_keywords" class="form-control" id="meta_keywords"
                                           placeholder="Введите ключевые слова"
                                           value="{{ old('meta_keywords', $post->meta_keywords) }}">
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

@section('script')
    <link rel="stylesheet" href="/public/css/admin/bootstrap-datepicker.min.css">
    <script src="/public/js/admin/bootstrap-datepicker.min.js"></script>
    <script>
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
    </script>
@endsection