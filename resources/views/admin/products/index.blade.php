@extends("layouts.admin")

@section('title', 'Товары')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список товаров</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.products.index')}}" method="get">
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
                            <th>#</th>
                            <th></th>
                            <th>Название</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th>Бренд</th>
                            <th>Количество</th>
                            <th></th>
                        </tr>
                        @if(count($products))
                            @foreach($products as $product)
                                <tr>
                                    <td><a target="_blank"
                                           href="{{route('products.show', $product['id'])}}">{{$product['id']}}</a></td>
                                    <td>
                                        @if(isset($product->images[0]))
                                            <a target="_blank"
                                               href="/storage{{$product->images[0]['path']}}/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
                                                <img style="width: 30px"
                                                     src="/storage{{$product->images[0]['path']}}/sm/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{$product['name']}}</td>
                                    <td>{{date('d-n-Y', strtotime($product['updated_at']))}}</td>
                                    <td>
                                        @if($product['status'])
                                            <span class="label label-success">Активный</span>
                                        @else
                                            <span class="label label-default">Невидимый</span>
                                        @endif
                                    </td>
                                    <td>{{$product->brands['name']}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>
                                        <form action="{{route('admin.products.destroy', $product['id'])}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-default"
                                               href="{{route('admin.products.edit', $product['id'])}}">
                                                <i class="fa fa-edit"></i> Изменить
                                            </a>
                                            <button type="submit" class="btn btn-default"
                                                    href="{{route('admin.products.destroy', $product['id'])}}">
                                                <i class="fa fa-remove"></i> Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="7">Не найдено</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <a style="margin-right: 5px;" href="{{route('admin.products.create')}}" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить
                    </a>
                    <a href="{{route('admin.products.multiple')}}" class="btn btn-default">
                        <i class="fa fa-upload"></i> Импорт из файла
                    </a>
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $products->links() }}
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection