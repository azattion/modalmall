@extends('layouts.admin')

@section('title', 'Товары')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Импорт из файла</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post"
                      action="{{route('admin.products.multiple')}}" enctype="multipart/form-data">
                    @csrf
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

@endsection