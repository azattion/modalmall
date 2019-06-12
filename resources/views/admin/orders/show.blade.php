@extends("layouts.admin")

@section('title', 'Заказы - Подробнее')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Просмотр заказа</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            {{--<div class="row">--}}
            <div class="col-sm-6">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th style="width:50%">Номер заказа:</th>
                            <td>{{$order['id']}}</td>
                        </tr>
                        <tr>
                            <th>Создано:</th>
                            <td>{{$order['created_at']}}</td>
                        </tr>
                        <tr>
                            <th>Имя:</th>
                            <td>{{$order->user['name']}}</td>
                        </tr>
                        <tr>
                            <th>Эл. почта:</th>
                            <td>{{$order['email']}}</td>
                        </tr>
                        <tr>
                            <th>Номер тел.:</th>
                            <td>{{$order['phone']}}</td>
                        </tr>
                        <tr>
                            <th>Адрес:</th>
                            <td>{{$order['address']}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-6">
                <p class="lead">Товары</p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        @if($order->items)
                            @foreach($order->items as $items)
                                <tr>
                                    <th style="width:50%">Номер товара:</th>
                                    <td>{{$items['pid']}} * {{$items['qt']}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{--</div>--}}
        </div>
        <div class="box-footer">
            <a href="{{route('admin.orders.index')}}" class="btn btn-default"><i class="fa fa-th-list"></i> В список</a>
            <a href="{{route('admin.orders.destroy', ['id' => $order['id']])}}" class="btn btn-default"><i
                        class="fa fa-remove"></i> Удалить</a>
        </div>
    </div>
@endsection