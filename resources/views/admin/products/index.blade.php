@extends("layouts.admin")

@section('title', 'Товары')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body text-right">
                    <a style="margin-right: 5px;" href="{{route('admin.products.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Добавить
                    </a>
                    <a href="{{route('admin.products.multiple')}}" class="btn btn-default">
                        <i class="fa fa-upload"></i> Импорт из файла
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список товаров</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.products.index')}}" method="get">
                            <div class="input-group input-group-sm" style="width: 250px;">
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
                <form method="post" action="{{route('admin.products.multi_selection')}}">
                    <div class="box-body table-responsive no-padding">
                        @csrf
                        <table class="table table-hover">
                            <tr>
                                <th><input type="checkbox" id="select_all"></th>
                                <th>#</th>
                                <th></th>
                                <th>Артикул</th>
                                <th>Название</th>
                                <th>Стоимость</th>
                                <th>Статус</th>
                                <th>Бренд</th>
                                <th>Количество</th>
                                <th></th>
                            </tr>
                            @if(count($products))
                                @foreach($products as $product)
                                    <tr>
                                        <td><input class="select_item" name="id[]" type="checkbox"
                                                   value="{{$product['id']}}"></td>
                                        <td><a target="_blank"
                                               href="{{route('products.show', $product['id'])}}">{{$product['id']}}</a>
                                        </td>
                                        <td>
                                            @php $product->images = $product->images()->orderBy('order')->get(); @endphp
                                            @if(isset($product->images[0]))
                                                <a target="_blank"
                                                   href="/storage{{$product->images[0]['path']}}/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
                                                    <img style="width: 30px"
                                                         src="/storage{{$product->images[0]['path']}}/sm/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{$product['vendor_code']}}</td>
                                        <td>{{$product['name']}}</td>
                                        <td>{{$product['cost']}}</td>
                                        {{--                                    <td>{{date('d-m-Y', strtotime($product['created_at']))}}</td>--}}
                                        <td>
                                            @php $statues = config('services.product_status'); @endphp
                                            {{--@dd($statues)--}}
                                            @if(isset($statues[$product['status']]))
                                                <span class="label label-{{$product['status']==1?'success':'danger'}}">{{$statues[$product['status']]}}</span>
                                            @endif
                                        </td>
                                        <td>{{$product->brands['name']}}</td>
                                        <td>{{$product['quantity']}}</td>
                                        <td>
                                            {{--<form action="{{route('admin.products.destroy', $product['id'])}}"--}}
                                            {{--method="post">--}}
                                            {{--@csrf--}}
                                            {{--@method('DELETE')--}}
                                            <a class="btn btn-link"
                                               href="{{route('admin.products.edit', $product['id'])}}">
                                                <i class="fa fa-edit"></i> Изменить
                                            </a>
                                            {{--<button type="submit" class="btn btn-default"--}}
                                            {{--href="{{route('admin.products.destroy', $product['id'])}}">--}}
                                            {{--<i class="fa fa-remove"></i> Удалить--}}
                                            {{--</button>--}}
                                            {{--</form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td colspan="8">Не найдено</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="no-margin pull-left">
                            <input type="submit" name="delete" class="btn btn-danger" value="Удалить">
                        </div>
                        <div class="no-margin pull-right">
                            {{ $products->links() }}
                        </div>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#select_all').change(function () {
                $('.select_item').prop('checked', $(this).is(':checked'));
            });
        });
    </script>
@endsection
