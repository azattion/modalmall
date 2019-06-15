@extends("layouts.admin")

@section('title', 'Категории товаров')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список категорий</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.categories.index')}}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input value="{{isset($_GET['q'])?$_GET['q']:''}}" type="text" name="q"
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
                            <th>ID</th>
                            <th></th>
                            <th>Название</th>
                            <th>Статус</th>
                            <th>В меню</th>
                            <th></th>
                        </tr>
                        @if(count($categories))
                            @foreach($categories as $category)
                                <tr>
                                    <td><a target="_blank"
                                           href="{{route('products.category', $category['id'])}}">{{$category['id']}}</a>
                                    </td>
                                    <td>
                                        @if(isset($category->images[0]))
                                            <a target="_blank"
                                               href="/storage{{$category->images[0]['path']}}/{{$category->images[0]['name']}}.{{$category->images[0]['ext']}}">
                                                <img style="width: 30px"
                                                     src="/storage{{$category->images[0]['path']}}/sm/{{$category->images[0]['name']}}.{{$category->images[0]['ext']}}">
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{str_repeat("—", $category['level']-1)}} {{$category->name}}</td>
                                    <td>
                                        @if($category['status'])
                                            <span class="label label-success">Активный</span>
                                        @else
                                            <span class="label label-default">Невидим</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($category['inc_menu'])
                                            <span class="label label-success">Включен</span>
                                        @else
                                            <span class="label label-default">Невидим</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.categories.destroy', $category['id'])}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-default" href="{{route('admin.categories.create')}}?pid={{$category['id']}}">
                                                <i class="fa fa-plus"></i> Создать
                                            </a>
                                            <a class="btn btn-default"
                                               href="{{route('admin.categories.edit', $category)}}">
                                                <i class="fa fa-edit"></i> Изменить
                                            </a>
                                            <button type="submit" class="btn btn-default"
                                                    href="{{route('admin.categories.destroy', $category)}}">
                                                <i class="fa fa-remove"></i> Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="6">Не найдено</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a style="margin-right: 5px;" href="{{route('admin.categories.create')}}" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить
                    </a>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection