@extends("layouts.admin")

@section('title', 'Меню')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список меню</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.menu.index')}}" method="get">
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
                        @php $menus = config('services.menu_type'); @endphp
                        @foreach($menus as $key => $menu)
                            <tr>
                                <td>{{$key}}</td>
                                <td><a href="{{route('admin.menu.show', $key)}}">{{$menu}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection