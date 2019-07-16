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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
                        @if($order['delivery'])
                            <tr>
                                <th>Доставка:</th>
                                @php $delivery_type = config('services.delivery_type'); @endphp
                                <td>{{$delivery_type[$order['delivery']]}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Товары</th>
                            <th>Кол.</th>
                            <th>Цвет</th>
                            <th>Размер</th>
                            <th>Стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $colors = config('services.colors');
                        $sizes = config('services.sizes');
                        @endphp
                        @if($order->items)
                            @foreach($order->items as $item)
                                <tr>
                                    <td style="width:50%">{{$item->product['name']}}</td>
                                    <td>{{$item['qt']}}</td>
                                    <td>{{$colors[$item['color']]}}</td>
                                    <td>{{$sizes[$item['size']]}}</td>
                                    <td>{{$item['cost']}} руб</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <form method="post" action="{{route('admin.orders.update', $order['id'])}}">
                        @csrf
                        @method('PUT')
                        @php $statuses = config('services.order_status'); @endphp
                        {{--<div class="row">--}}
                        <div class="col-md-6">
                            <select class="form-control" name="status" id="">
                                @foreach($statuses as $key => $status)
                                    <option @if($key==$order['status']) selected
                                            @endif value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">
                                Изменить
                            </button>
                        </div>
                        {{--</div>--}}
                    </form>
                </div>
            </div>
            {{--</div>--}}
        </div>
        <div class="box-footer">
            <form method="post" action="{{route('admin.orders.destroy', $order['id'])}}">
                @csrf
                @method('DELETE')
                <a href="{{route('admin.orders.index')}}" class="btn btn-default"><i class="fa fa-th-list"></i>
                    Вернуться в списки</a>
                <button class="btn btn-default">
                    <i class="fa fa-remove"></i> Удалить
                </button>
            </form>
            <div class="pull-right">

            </div>
        </div>
    </div>
@endsection