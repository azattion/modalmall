@extends('layouts.app')

@section('title', 'Мои избранные товары')

@section('content')
    <h1>Мои избранные</h1>
    <table class="table">
        <thead>
            <tr>
                <th>

                </th>
                <th>
                    Наименование товара
                </th>
                <th>
                    Добавлено
                </th>
                <th>
                    Дополнительно
                </th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($favorites as $favorite)
            <tr>
                <td>
                    @if(isset($favorite->product->images[0]))
                        <img class="img-fluid" style="width: 80px"
                             src="/storage{{$favorite->product->images[0]['path']}}/sm/{{$favorite->product->images[0]['name']}}.{{$favorite->product->images[0]['ext']}}">
                    @else
                        <img class="img-fluid" style="width: 80px" src="http://www.scppa.org/image.axd?picture=/2018/04/photo_not_available.png">
                    @endif
                </td>
                <td>
                    <a href="{{route('products.show', $favorite['pid'])}}">
                        {{$favorite->product['name']}}
                    </a>
                </td>
                <td>
                    {{$favorite['created_at']}}
                </td>
                <td>
                    <div>
                        {{$favorite->product['cost']}} руб.
                    </div>
                    <div>
                        {{$favorite->product['available']?"В наличии":"Нет в наличии"}}
                    </div>
                </td>
                <td>
                    <form method="post" action="{{route('user.favorite.destroy', $favorite['id'])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <style>
        .table td{
            vertical-align: middle;
        }
    </style>
    <div>
        <div class="no-margin pull-right">
            {{ $favorites->links() }}
        </div>
    </div>
@endsection