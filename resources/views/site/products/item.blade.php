@extends('layouts.app')

@section('title', "Product")

@section('content')

    <h1>{{$product['name']}}</h1>
    <p>{{$product->category['name']}}</p>
    <p><a target="_blank" href="{{route('admin.products.edit', $product['id'])}}">Изменить</a></p>
    <div class="row">
        <div class="col-md-6">
            @if($product->images)
                <div class="row">
                    @foreach($product->images as $image)
                        <div class="col-md-3"><img class="img-fluid"
                                                   src="/storage{{$image['path']}}/{{$image['name']}}.{{$image['ext']}}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <p>{{$product['price']}} RUB</p>
            <p>Коллекция {{$product['collection']}}</p>
            <p>Количество {{$product['quantity']}}</p>
            <p>Размеры {{$product['size']}}</p>
            <p>Цвета {{$product['color']}}</p>
            <form method="post" action="{{route('site.products.cart-add')}}">
                {{csrf_field()}}
                <input type="number" name="qt" min="1" value="1">
                <input type="hidden" name="id" value="{{$product['id']}}">
                <button type="submit" class="btn btn-primary">В корзину</button>
            </form>

        </div>
        <div class="col-md-12">
            {!! $product['desc'] !!}
        </div>
        <div class="col-md-12">
            <h5>Отзывы</h5>
            @foreach($product->reviews as $review)
                <div>{{$review['star']}} => {{$review['text']}}</div>
            @endforeach
            <form action="{{route('site.products.review')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="pid" value="{{$product['id']}}">
                <input required type="range" name="star" min="1" max="5">
                <textarea placeholder="Введите отзыв" required name="text" class="form-control">
                    {{old('text')}}
                </textarea>
                <button type="submit" class="btn btn-primary">
                    Добавить
                </button>
            </form>
        </div>
    </div>
@endsection