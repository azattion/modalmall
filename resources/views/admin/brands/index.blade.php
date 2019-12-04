@extends("layouts.admin")

@section('title', 'Бренды')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список брендов</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.brands.index')}}" method="get">
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
                            <th></th>
                        </tr>
                        @if(count($brands))
                            @foreach($brands as $brand)
                                <tr>
                                    <td>
                                        <a target="_blank"
                                           href="{{route('products.category', 0)}}/?brand={{$brand['id']}}">{{$brand['id']}}</a>
                                    </td>
                                    <td>
                                        @if(isset($brand->images[0]))
                                            <a target="_blank"
                                               href="/storage{{$brand->images[0]['path']}}/{{$brand->images[0]['name']}}.{{$brand->images[0]['ext']}}">
                                                <img style="width: 30px"
                                                     src="/storage{{$brand->images[0]['path']}}/md/{{$brand->images[0]['name']}}.{{$brand->images[0]['ext']}}">
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{$brand['name']}}</td>
                                    <td>
                                        @if($brand['status'])
                                            <span class="label label-success">Активный</span>
                                        @else
                                            <span class="label label-default">Невидим</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.brands.destroy', $brand['id'])}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-default"
                                               href="{{route('admin.brands.edit', $brand)}}">
                                                <i class="fa fa-edit"></i> Изменить
                                            </a>
                                            <button onclick="return confirm('Вы действительно хотите удалить?')" type="submit" class="btn btn-default"
                                                    href="{{route('admin.brands.destroy', $brand)}}">
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
                    <a style="margin-right: 5px;" href="{{route('admin.brands.create')}}" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить
                    </a>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection