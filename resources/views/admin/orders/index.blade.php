@extends("layouts.admin")

@section('title', 'Заказы')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список заказов</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.orders.index')}}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input value="{{isset($_GET['q'])?$_GET['q']:''}}" type="text" name="q" class="form-control pull-right"
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
                            <th>Имя</th>
                            <th>Номер тел.</th>
                            <th>Эл. почта</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th>Адрес</th>
                            <th></th>
                        </tr>
                        @if(count($orders))
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order['id']}}</td>
                                    <td>{{$order->user['name']}}</td>
                                    <td>{{$order['phone']}}</td>
                                    <td>{{$order['email']}}</td>
                                    <td>{{$order['created_at']}}</td>
                                    <td>
                                        @if($order['status'])
                                            <span class="label label-success">Активный</span>
                                        @else
                                            <span class="label label-default">Невидимый</span>
                                        @endif
                                    </td>
                                    <td>{{$order['address']}}</td>
                                    <td>
                                        <a class="btn btn-default" href="{{route('admin.orders.show', $order['id'])}}">Детали</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">Не найдено</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $orders->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection