@extends("layouts.admin")

@section('title', 'Публикации')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список публикаций</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Заголовок</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post['id']}}</td>
                        <td>{{$post['title']}}</td>
                        <td>{{$post['date']}}</td>
                        <td>
                            @if($post['status'])
                                <span class="label label-success">Активный</span>
                            @else
                                <span class="label label-default">Невидимый</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-default" href="{{route('admin.posts.edit', $post)}}">
                                    <i class="fa fa-edit"></i> Изменить
                                </a>
                                <button type="submit" class="btn btn-default"
                                        href="{{route('admin.posts.destroy', $post)}}">
                                    <i class="fa fa-remove"></i> Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <a style="margin-right: 5px;" href="{{route('admin.posts.create')}}" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить
                </a>
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $posts->links() }}
                </ul>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection