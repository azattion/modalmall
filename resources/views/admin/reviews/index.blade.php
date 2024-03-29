@extends("layouts.admin")

@section('title', 'Отзывы')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список отзывов</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.reviews.index')}}" method="get">
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
                            <th>ID</th>
                            <th>Клиент</th>
                            <th>Продукт</th>
                            <th>Оценка</th>
                            <th>Текст</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                        @if(count($reviews))
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{$review['id']}}</td>
                                    <td>{{$review->user['name']}}</td>
                                    <td><a target="_blank" href="{{route('products.show', $review['pid'])}}">{{$review->product['name']}}</a></td>
                                    <td>{{$review['star']}}</td>
                                    <td>{{$review['text']}}</td>
                                    <td>{{$review['created_at']}}</td>
                                    <td>
                                        @if($review['status'])
                                            <span class="label label-success">Активный</span>
                                        @else
                                            <span class="label label-default">Невидимый</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.reviews.destroy', $review['id'])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Вы действительно хотите удалить?')" type="submit" class="btn btn-link">
                                                <i class="fa fa-remove"></i> Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="8">Не найдено</td>
                            </tr>
                        @endif
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