@extends("layouts.admin")

@section('title', 'Товары')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Просмотр товара</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            {{--<div class="row">--}}
            <div class="col-sm-6">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th style="width:50%">ID:</th>
                            <td>{{$product['id']}}</td>
                        </tr>
                        <tr>
                            <th>Название:</th>
                            <td>{{$product['name']}}</td>
                        </tr>
                        <tr>
                            <th>Стоимость:</th>
                            <td>{{$product['price']}}</td>
                        </tr>
                        <tr>
                            <th>Статус:</th>
                            <td>{{$product['status']}}</td>
                        </tr>
                        <tr>
                            <th>Код:</th>
                            <td>{{$product['vendor_code']}}</td>
                        </tr>
                        <tr>
                            <th>Штрих-код:</th>
                            <td>{{$product['barcode']}}</td>
                        </tr>
                        <tr>
                            <th>Коллекция:</th>
                            <td>{{$product['collection']}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <p class="lead">Описание</p>
                {{$product['desc']}}
            </div>
            {{--</div>--}}
        </div>
        <div class="box-footer">
            <a href="{{route('admin.products.index')}}" class="btn btn-default"><i class="fa fa-th-list"></i> В
                список</a>
            <a href="{{route('admin.products.destroy', ['id' => $product['id']])}}" class="btn btn-default"><i
                        class="fa fa-remove"></i> Удалить</a>
        </div>
    </div>
@endsection