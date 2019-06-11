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
            @if($product['color'])
                <p><?php $colors = config('services.colors');?> Цвета {{$colors[$product['color']]}}</p>
            @endif
            <form method="post" action="{{route('user.cart.store')}}">
                @csrf
                <input type="number" name="qt" min="1" value="1">
                <input type="hidden" name="id" value="{{$product['id']}}">
                <button type="submit" class="btn btn-primary">В корзину</button>
            </form>
            @if($product->favorite)
                <form action="{{route('user.favorite.destroy', $product->favorite['id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="pid" value="{{$product['id']}}">
                    <button type="submit" class="btn btn-primary">
                        Удалить из избранных
                    </button>
                </form>
            @else
                <form action="{{route('user.favorite.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="pid" value="{{$product['id']}}">
                    <button type="submit" class="btn btn-primary">
                        В избранное
                    </button>
                </form>
            @endif

        </div>
        <div class="col-md-12">
            {!! $product['desc'] !!}
        </div>
        <div class="col-md-6">
            <h5>Отзывы</h5>
            <?php $hasUserReview = false; ?>
            @foreach($product->reviews as $review)
                <div>{{$review['star']}} => {{$review['text']}}
                    @if(auth()->id() && $review['uid']==auth()->id())
                        <?php $hasUserReview = true; ?>
                        <form method="post" action="{{route('user.review.destroy', $review['id'])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit">Удалить</button>
                        </form>
                    @endif
                </div>
            @endforeach
            @if(!$hasUserReview)
                <form action="{{route('user.review.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="pid" value="{{$product['id']}}">
                    <input required type="range" name="star" min="1" max="5">
                    <textarea placeholder="Введите отзыв" required name="text"
                              class="form-control">{{old('text')}}</textarea>
                    <button type="submit" class="btn btn-primary">
                        Добавить
                    </button>
                </form>
            @endif
        </div>
    </div>
@endsection