@extends("layouts.admin")

@section('title', 'Меню')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- box-header -->
                <div class="box-header">
                    <h3 class="box-title">Меню</h3>
                </div>
                <form role="form" method="post" enctype="multipart/form-data"
                      action="{{route('admin.menu.update', $menu['id'])}}">
                    @csrf
                    @method('PUT')
                    <!-- /.box-header -->
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
                        <input type="hidden" name="type" value="{{$menu['type']}}">
                        <div class="form-group @error('title') has-error @enderror">
                            <label for="title">Название</label>
                            <input type="text" name="title" class="form-control" id="title"
                                   placeholder="Введите название"
                                   autocomplete="off"
                                   value="{{ old('title', $menu['title']) }}">
                        </div>
                        <div class="form-group @error('image') has-error @enderror">
                            <label for="image">Иконка</label>
                            <input accept="image/*" type="file" name="image" id="image">
                            <p class="help-block">Максимальный размер 3 Мб</p>
                        </div>
                        <div class="form-group @error('link') has-error @enderror">
                            <label for="link">Ссылка</label>
                            <input type="text" name="link" class="form-control" id="link"
                                   placeholder="Введите ссылку"
                                   autocomplete="off"
                                   value="{{ old('link', $menu['link']) }}">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input {{old('status', $menu['status'])?'checked':''}} name="status" value="1"
                                       type="checkbox">
                                Активный
                            </label>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button name="save-2list" value="1" type="submit" class="btn btn-primary pull-right">
                            <i class="fa fa-save"></i> Сохранить
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection