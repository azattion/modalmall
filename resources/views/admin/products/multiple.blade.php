@extends('layouts.admin')

@section('title', 'Товары')

@section('content')

    <div class="row">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Импорт из файла</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post"
                      action="{{route('admin.products.import')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group @error('file') has-error @enderror">
                            <label for="file">Файл</label>
                            <input required accept=".xls" type="file" name="file" id="file">
                            <p class="help-block">Максимальный размер 50 Мб</p>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i>
                            Загрузить
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

    @if(isset($data) && count($data))
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Результат</h3>
            </div>
            <table class="table table-borderless">
                @foreach ($data as $key => $row)
                    @php  $row = array_values($row); @endphp
                    <tr>
                        <td>{{$key}}</td>
                        {{--@foreach ($row as $ik => $item)--}}
                        {{--<td>{{$ik}} - {{$item}}</td>--}}
                        {{--@endforeach--}}
                        <td>{{$row[4]}} {{$row[5]}}</td>
                        <td>{{$row[6]}}</td>
                        <td>{{$row[9]}}</td>
                        <td>{{ count($row)==21 ? $row[19] : $row[18] }}</td>
                        <td>{{ count($row)==21 ? $row[20] : $row[19] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

@endsection