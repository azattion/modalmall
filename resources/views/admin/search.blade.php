@extends("layouts.admin")

@section('title', 'Поиск')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список товаров</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.products.index')}}" method="get">
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
                            <th>Название</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th>Категория</th>
                            <th>Количество</th>
                            <th></th>
                        </tr>
                        @if(count($products))
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product['id']}}</td>
                                    <td>{{$product['name']}}</td>
                                    <td>{{date('d-n-Y', strtotime($product['created_at']))}}</td>
                                    <td>
                                        @if($product['status'])
                                            <span class="label label-success">Активный</span>
                                        @else
                                            <span class="label label-default">Невидимый</span>
                                        @endif
                                    </td>
                                    <td>{{$product['cat']}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>
                                        <form action="{{route('admin.products.destroy', $product['id'])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-default" href="{{route('admin.products.edit', $product)}}">
                                                <i class="fa fa-edit"></i> Изменить
                                            </a>
                                            <button type="submit" class="btn btn-default"
                                                    href="{{route('admin.products.destroy', $product)}}">
                                                <i class="fa fa-remove"></i> Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="6">Не найдено</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <a style="margin-right: 5px;" href="{{route('admin.products.create')}}" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить
                    </a>
                    <a href="{{route('admin.products.multiple')}}" class="btn btn-default">
                        <i class="fa fa-upload"></i> Импорт из файла
                    </a>
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $products->links() }}
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список публикаций</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.posts.index')}}" method="get">
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
                            <th>Заголовок</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                        @if(count($posts))
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
                        @else
                            <tr class="text-center">
                                <td colspan="5">Не найдено</td>
                            </tr>
                        @endif
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
                            <th>ID</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Reason</th>
                        </tr>
                        @if(count($users))
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td><span class="label label-success">Approved</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                            <th>Заголовок</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                        @if(count($reviews))
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
                        @else
                            <tr class="text-center">
                                <td colspan="4">Не найдено</td>
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