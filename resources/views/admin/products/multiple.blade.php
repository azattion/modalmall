@extends('layouts.admin')

@section('title', 'Товары')

@section('content')
    <div class="row">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Импорт из файла</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post"
                      action="{{route('admin.products.import')}}">
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
                        <div class="form-group @error('files') has-error @enderror">
                            <label for="files">Файл</label>
                            <input accept=".csv" type="file" name="files" id="files">
                            <p class="help-block">Максимальный размер 10 Мб</p>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-upload"></i> Импортировать</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection