@extends("layouts.admin")

@section('title', 'Отзывы')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список отзывов</h3>

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
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{$review['id']}}</td>
                                <td>{{$review['title']}}</td>
                                <td>{{$review['date']}}</td>
                                <td>
                                    @if($review['status'])
                                        <span class="label label-success">Активный</span>
                                    @else
                                        <span class="label label-default">Невидимый</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('admin.reviews.destroy', $review['id'])}}" method="review">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-default"
                                                href="{{route('admin.reviews.destroy', $review)}}">
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
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $reviews->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection