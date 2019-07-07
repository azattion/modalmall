@extends('layouts.app')

@section('page_title', 'Мои отзывы')

@section('content')
    <h1>Мои отзывы</h1>
    <table class="table">
        <thead>
        <tr>
            <th>

            </th>
            <th>
                Наименование товара
            </th>
            <th>
                Оценка
            </th>
            <th>
                Текст
            </th>
            <th>
                Добавлено
            </th>
            <th>

            </th>
        </tr>
        </thead>
        <tbody>
        @if(count($reviews))
            @foreach($reviews as $review)
                <tr>
                    <td>
                        @if(isset($review->product->images[0]))
                            <img class="img-fluid" style="width: 150px"
                                 src="/storage{{$review->product->images[0]['path']}}/sm/{{$review->product->images[0]['name']}}.{{$review->product->images[0]['ext']}}">
                        @else
                            <img class="img-fluid" style="width: 80px"
                                 src="http://www.scppa.org/image.axd?picture=/2018/04/photo_not_available.png">
                        @endif
                    </td>
                    <td>
                        <a href="{{route('products.show', $review['pid'])}}">
                            {{$review->product['name']}}
                        </a>
                        <div>
                            @if($review->product->is_sale)
                                {{number_format($review->product->cost_with_sale, 0, '.', ' ')}} руб.
                                <br/>
                                <span style="text-decoration: line-through">
                                {{$review->product['cost']}} руб.
                            </span>
                                Скидка {{ $review->product['sale_percent'] }}%
                            @else
                                {{number_format($review->product['cost'], 0, '.', ' ')}} руб.
                            @endif
                            {{--{{$review->product['cost']}} руб.--}}
                        </div>
                    </td>
                    <td>
                        <div class="product__review-img">
                            <div style="width: @if($review->product->average_rating) {{$review->product->average_rating*100/5}}% @else 0% @endif"></div>
                        </div>
                    </td>
                    <td>
                        <div>
                            {{$review['text']}}
                        </div>
                    </td>
                    <td>
                        {{$review['created_at']}}
                    </td>
                    <td>
                        <form method="post" action="{{route('user.review.destroy', $review['id'])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="6">
                    Не найдено
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    <style>
        .table td {
            vertical-align: middle;
        }
    </style>
    <div>
        <div class="no-margin pull-right">
            {{ $reviews->links() }}
        </div>
    </div>
@endsection