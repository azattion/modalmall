@extends("layouts.admin")

@section('title', 'Клиенты')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список клиентов</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.users.index')}}" method="get">
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
                            <th>Эл. почта</th>
                            <th>Статус</th>
                            <th>Дата созд</th>
                        </tr>
                        @if(count($users))
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['surname']}} {{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>
                                        @if($user['status'])
                                            <span class="label label-success">Активный</span>
                                        @else
                                            <span class="label label-default">Невидимый</span>
                                        @endif
                                    </td>
                                    <td>{{$user['created_at']}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">Не найдено</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $users->links() }}
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection