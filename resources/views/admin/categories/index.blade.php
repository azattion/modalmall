@extends("layouts.admin")

@section('title', 'Категории товаров')

<?
function sectionslist2($categories_tree, $pid=0)
{// WE - уровень вложенности
    static $level = 0;
    $txt = '';
    $level++;
    if ($level == 1) $txt .= "";
    foreach ($categories_tree[$pid] as $k => $v) {
        if ($v["id"]) {
            $space = '--';
            $spaces = "";
            if ($level > 1) for ($k = 0; $k < $level; $k++) $spaces .= $space;
            $txt .= "<tr>";
            $txt .= "<td>{$v['id']}</td><td>";
            $txt .= $spaces;
            $txt .= " {$v['name']}</td><td>{$v['created_at']}</td><td>{$v['status']}</td><td>{$v['inc_menu']}</td>";
            $txt .= "<td><form method='post'><a href='/admin/categories/{$v['id']}/edit' class='btn btn-default'><i class='fa fa-edit'></i> Изменить</a><button type='submit' class='btn btn-default'><i class='fa fa-remove'></i> Удалить</button></form></td>";
            $txt .= "</tr>";
            if (isset($categories_tree[$v["id"]])) $txt .= sectionslist2($categories_tree, $v["id"]);
        }
    }
    if ($level == 1) $txt .= "";
    $level--;
    return $txt;
}
?>

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список категорий</h3>

                    <div class="box-tools">
                        <form action="{{route('admin.categories.index')}}" method="get">
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
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Date</th>
                            <th>Статус</th>
                            <th>Включение в меню</th>
                            <th></th>
                        </tr>
                        {!! sectionslist2($categories_tree, 0) !!}
                        @if(0 && count($categories))
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <form action="{{route('admin.categories.destroy', $category['id'])}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-default"
                                               href="{{route('admin.categories.edit', $category)}}">
                                                <i class="fa fa-edit"></i> Изменить
                                            </a>
                                            <button type="submit" class="btn btn-default"
                                                    href="{{route('admin.categories.destroy', $category)}}">
                                                <i class="fa fa-remove"></i> Удалить
                                            </button>
                                        </form>
                                    </td>
                                    <td><a target="_blank"
                                           href="{{route('products.category', $category['id'])}}">{{$category['id']}}</a>
                                    </td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category['created_at']}}</td>
                                    <td>
                                        @if($category['status'])
                                            <span class="label label-success">Активный</span>
                                        @else
                                            <span class="label label-default">Невидим</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($category['inc_menu'])
                                            <span class="label label-success">Включен</span>
                                        @else
                                            <span class="label label-default">Невидим</span>
                                        @endif
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
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a style="margin-right: 5px;" href="{{route('admin.categories.create')}}" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить
                    </a>
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $categories->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection