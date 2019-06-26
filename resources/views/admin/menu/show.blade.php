@extends("layouts.admin")

@section('title', 'Меню')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Меню</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.menu.index')}}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input value="{{isset($_GET['q']) ? $_GET['q'] : ''}}" type="text" name="q"
                                       class="form-control pull-right"
                                       placeholder="Поиск">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Иконка</th>
                            <th>Название</th>
                            <th>Ссылка</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                        @foreach($menu as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>
                                    @if(isset($item->images[0]))
                                        <a target="_blank"
                                           href="/storage{{$item->images[0]['path']}}/{{$item->images[0]['name']}}.{{$item->images[0]['ext']}}">
                                            <img style="width: 30px"
                                                 src="/storage{{$item->images[0]['path']}}/sm/{{$item->images[0]['name']}}.{{$item->images[0]['ext']}}">
                                        </a>
                                    @endif
                                </td>
                                <td>{{$item['title']}}</td>
                                <td><a target="_blank" href="{{$item['link']}}">{{$item['link']}}</a></td>
                                <td>
                                    @if($item['status'])
                                        <span class="label label-success">Активный</span>
                                    @else
                                        <span class="label label-default">Невидимый</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('admin.menu.destroy', $item['id'])}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input name="type" type="hidden" value="{{$type}}">
                                        <a class="btn btn-default"
                                           href="{{route('admin.menu.edit', $item['id'])}}">
                                            <i class="fa fa-edit"></i> Изменить
                                        </a>
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-remove"></i> Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->
        </div>
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{"Добавить"}} меню</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data"
                      action="{{route('admin.menu.store', $type)}}">
                    @csrf
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
                        <input type="hidden" name="type" value="{{$type}}">
                        <div class="form-group @error('title') has-error @enderror">
                            <label for="title">Название</label>
                            <input type="text" name="title" class="form-control" id="title"
                                   placeholder="Введите название"
                                   autocomplete="off"
                                   value="{{ old('title') }}">
                        </div>
                        <div class="form-group @error('image') has-error @enderror">
                            <label for="image">Иконка</label>
                            <input accept="image/*" type="file" name="image" id="image">
                            <p class="help-block">Максимальный размер 3 Мб</p>
                        </div>
                        <div class="form-group @error('link') has-error @enderror">
                            <label for="link">Ссылка</label>
                            <input type="text" name="link" class="form-control" id="link"
                                   placeholder="Введите ссылку"
                                   autocomplete="off"
                                   value="{{ old('link') }}">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input {{old('status')?'checked':''}} name="status" value="1"
                                       type="checkbox">
                                Активный
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
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