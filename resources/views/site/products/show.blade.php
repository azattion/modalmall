@extends('layouts.app')

@section('title', "Product")

@section('content')

    <h1>{{$product['name']}}</h1>
    <p>{{$product->category['name']}}</p>
    <div class="row">
        <div class="col-md-4">
            <div class="product__cover text-center">
                @if(count($product->images))
                    <div class="product__img product-img-full">
                        <img style="height: 200px;" class="img-fluid"
                             src="/storage{{$product->images[0]['path']}}/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
                    </div>

                    <div class="product__images">
                        <div class="product_images_row">
                            @foreach($product->images as $image)
                                <div class="product__img">
                                    <img class="img-fluid"
                                         src="/storage{{$image['path']}}/{{$image['name']}}.{{$image['ext']}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="product__img">
                        <img style="height: 200px;" class="img-fluid"
                             src="http://www.scppa.org/image.axd?picture=/2018/04/photo_not_available.png">
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div><a target="_blank" href="{{route('admin.products.edit', $product['id'])}}">Редактировать
                    товар</a></div>
            <div class="product__cost">{{$product['price']}} <img style="width: 20px"
                                                                  src="https://static.thenounproject.com/png/92306-200.png"
                                                                  alt=""></div>
            <div class="product__collection">Коллекция: {{$product['collection']}}</div>
            <div class="product__quantity">Количество: {{$product['quantity']}}</div>

            @php
            $colors = config('services.colors');
            $product_colors = explode('|', trim($product['colors'], '|'));
            @endphp
            {{--@php dump($product_colors) @endphp--}}
            @if($product['colors'] && count($product_colors))
                <div class="product__colors">Выберите
                    цвет: @foreach($product_colors as $color) {{$colors[$color]}}
                    , @endforeach</div>
            @endif

            @php
            $sizes = config('services.sizes');
            $product_sizes = explode('|', trim($product['sizes'], '|'));
            @endphp
            @if($product['sizes'] && count($product_sizes))
                <div class="product__sizes">Выберите
                    размер: @foreach($product_sizes as $size) {{$sizes[$size]}}
                    , @endforeach
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Таблица размеров
                    </button>
                </div>
                @endif

                        <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Таблица размеров</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post" action="{{route('user.cart.store')}}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" value="{{$product['id']}}">
                        @if($product['quantity'])
                            <div class="col-sm-2">
                                <input class="form-control" type="number" name="qt" min="1" value="1">
                            </div>
                            <button type="submit" class="btn btn-success">В корзину</button>
                        @else
                            <button type="submit" disabled class="btn btn-success">Нет в наличии</button>
                        @endif
                        @if($product->favorite)
                            <form action="{{route('user.favorite.destroy', $product->favorite['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="pid" value="{{$product['id']}}">
                                <button onclick="return confirm('Вы действительно хотите удалить?')" type="submit"
                                        class="btn btn-link">
                                    Удалить из избранных
                                </button>
                            </form>
                        @else
                            <form action="{{route('user.favorite.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="pid" value="{{$product['id']}}">
                                <button type="submit" class="btn btn-link">
                                    В избранное
                                </button>
                            </form>
                        @endif
                    </div>
                </form>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered">
                @if($product['brand'])
                    <tr>
                        @php $brands = config('services.brands'); @endphp
                        <td>Бренд</td>
                        <td>{{$brands[$product['brand']]}}</td>
                    </tr>
                @endif
                @if($product['producer'])
                    <tr>
                        @php $producers = config('services.producers'); @endphp
                        <td>Производитель</td>
                        <td>{{$producers[$product['producer']]}}</td>
                    </tr>
                @endif
                @if($product['composition'])
                    <tr>
                        <td>Состав</td>
                        <td>{{$product['composition']}}</td>
                    </tr>
                @endif
                @if($product['desc'])
                    <tr>
                        <td>Описание</td>
                        <td>{!! $product['desc'] !!}</td>
                    </tr>
                @endif
            </table>
        </div>

        <div class="col-md-12 text-center">
            <div>
                <img style="width: 35px" src="/img/no-refund.png" alt="Товар возврату не подлежит">
                Товар возврату не подлежит
            </div>
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
                            <button onclick="return confirm('Вы действительно хотите удалить?')"
                                    class="btn btn-success"
                                    type="submit">Удалить
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
            @if(!$hasUserReview)
                <form action="{{route('user.review.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="pid" value="{{$product['id']}}">
                    <div class="form-group">
                        <input required type="range" name="star" min="1" max="5">
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Введите отзыв" required name="text"
                                  class="form-control">{{old('text')}}</textarea>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Добавить
                    </button>
                </form>
            @endif
        </div>
    </div>
@endsection

