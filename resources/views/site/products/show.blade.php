@extends('layouts.app')

@section('title', "Product")

@section('content')

    <div class="product__field product__category">{{$category['name']}}</div>
    <div class="row">
        <div class="col-md-4">

            <div class="product__field product__cover text-center">
                @if(count($product->images))
                    <div class="exzoom" id="exzoom">
                        <!-- Images -->
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach($product->images as $image)
                                    <li class="">
                                        <img class="img-fluid"
                                             src="/storage{{$image['path']}}/{{$image['name']}}.{{$image['ext']}}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <!-- Nav Buttons -->
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>
                @else
                    <div class="product__field product__img">
                        <img style="height: 200px;" class="img-fluid"
                             src="http://www.scppa.org/image.axd?picture=/2018/04/photo_not_available.png">
                    </div>
                @endif

                {{--<div class="product__field product__img product-img-full">--}}
                {{--<img style="height: 200px;" class="img-fluid"--}}
                {{--src="/storage{{$product->images[0]['path']}}/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">--}}
                {{--</div>--}}

                {{--<div class="product__field product__images">--}}
                {{--<div class="product_images_row">--}}
                {{--@foreach($product->images as $image)--}}
                {{--<div class="product__field product__img">--}}
                {{--<img class="img-fluid"--}}
                {{--src="/storage{{$image['path']}}/{{$image['name']}}.{{$image['ext']}}">--}}
                {{--</div>--}}
                {{--@endforeach--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="col-md-8">
            <div class="product__field product__admin">
                <a target="_blank" href="{{route('admin.products.edit', $product['id'])}}">
                    Редактировать товар
                </a>
            </div>
            <h1 class="product__field">
                <span class="product__field product__name">
                    {{$product['name']}} / Арт: {{$product['vendor_code']}}
                </span>
            </h1>
            @php $reviews = $product->reviews; @endphp
            <div class="product__field product__review">
                {{--@php $star = 0; @endphp--}}
                {{--@foreach($reviews as $review)--}}
                    {{--@php $star += $review['star']; @endphp--}}
                {{--@endforeach--}}
                <div class="product__review-value">{{number_format($product->average_rating, 1)}}</div>
                <div class="product__review-img">
                    <div style="width: @if($product->average_rating) {{$product->average_rating*100/5}}% @else 0% @endif"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="product__field product__cost">
                @if($product->is_sale)
                    {{$product->cost_with_sale}} руб.
                    <span class="product__field product__cost_sale">{{$product['cost']}} руб.</span> <span
                            class="badge badge-danger">{{$product['sale_percent']}}
                        %</span>
                @else
                    <span>{{number_format($product['cost'], 0, '.', ' ')}}</span> руб.
                @endif
            </div>
            <div class="product__field product__collection">Коллекция: {{$product['collection']}}</div>
            <div class="product__field product__quantity">Количество в упаковке: {{$product['quantity']}}</div>

            <form class="product__cart-form" method="post" action="{{route('user.cart.store')}}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                $colors = config('services.colors');
                $product_colors = explode('|', trim($product['colors'], '|'));
                @endphp
                {{--@php dump($product_colors) @endphp--}}
                @if($product['colors'] && count($product_colors))
                    <div class="product__field product__colors">
                        Выберите цвет:
                        @foreach($product_colors as $key => $color)
                            <div class="form-check form-check-inline">
                                <input {{$key==0?"checked":""}} id="color{{$key}}" class="d-none form-check-input"
                                       type="radio" name="color"
                                       value="{{$color}}">
                                <label class="form-check-label" for="color{{$key}}">{{$colors[$color]}}</label>
                            </div>
                        @endforeach
                    </div>
                @endif

                @php
                $sizes = config('services.sizes');
                $product_sizes = explode('|', trim($product['sizes'], '|'));
                @endphp

                @if($product['sizes'] && count($product_sizes))
                    <div class="product__field product__sizes">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label for="size" class="col-sm-6 col-form-label">Выберите размер:</label>
                                    <div class="col-sm-6">
                                        <select name="size" id="size">
                                            @foreach($product_sizes as $key => $size)
                                                <option value="{{$size}}">{{$sizes[$size]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-link" data-toggle="modal"
                                        data-target="#tableSizes">
                                    Таблица размеров
                                </button>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="row">
                    @csrf
                    <input type="hidden" name="id" value="{{$product['id']}}">
                    {{--<input type="hidden" name="status" value="{{$product['available'] ? 1 : 2}}">--}}
                    {{--<div class="col-sm-3">--}}
                    {{--<div class="input-group">--}}
                    {{--<div class="input-group-prepend">--}}
                    {{--<input type="button" value="-" class="product__qt-minus btn">--}}
                    {{--</div>--}}
                    <input type="hidden" pattern="\d+" name="qt"
                           class="product__qt form-control text-center" value="1" min="1" required="">
                    {{--<div class="input-group-append">--}}
                    {{--<input type="button" value="+" class="product__qt-plus btn">--}}
                    {{--</div>--}}
                    {{--<input class="form-control" type="number" name="qt" min="1" value="1">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success">
                            @if($product['available'])В корзину @else Предзаказать @endif
                        </button>
                    </div>

                    {{--<div>Нет в наличии</div>--}}
                </div>
            </form>

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

        <!-- Modal -->
        <div class="modal fade" id="tableSizes" tabindex="-1" role="dialog"
             aria-labelledby="tableSizesLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tableSizesLabel">Таблица размеров</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table align="center" test="9" width="100%">
                            <tbody>
                            <tr class="tr_head">
                                <td>
                                    <div>Российский размер</div>
                                </td>
                                <td>
                                    <div>Размер производителя</div>
                                </td>
                                <td>
                                    <div>Обхват груди, в см</div>
                                </td>
                                <td>
                                    <div>Обхват талии, в см</div>
                                </td>
                                <td>
                                    <div>Обхват бедер, в см</div>
                                </td>
                            </tr>
                            <tr class="data-size">
                                <td>
                                    <div>40</div>
                                </td>
                                <td>
                                    <div>40</div>
                                </td>
                                <td>
                                    <div>78-81</div>
                                </td>
                                <td>
                                    <div>56-59</div>
                                </td>
                                <td>
                                    <div>83-86</div>
                                </td>
                            </tr>
                            <tr class="data-size">
                                <td>
                                    <div>40-ULTRA</div>
                                </td>
                                <td>
                                    <div>34/170</div>
                                </td>
                                <td>
                                    <div>78-81</div>
                                </td>
                                <td>
                                    <div>57-60</div>
                                </td>
                                <td>
                                    <div>80-83</div>
                                </td>
                            </tr>
                            <tr class="data-size">
                                <td>
                                    <div>42-ULTRA</div>
                                </td>
                                <td>
                                    <div>36/170</div>
                                </td>
                                <td>
                                    <div>82-85</div>
                                </td>
                                <td>
                                    <div>61-64</div>
                                </td>
                                <td>
                                    <div>84-87</div>
                                </td>
                            </tr>
                            <tr class="data-size">
                                <td>
                                    <div>44</div>
                                </td>
                                <td>
                                    <div>38</div>
                                </td>
                                <td>
                                    <div>86-89</div>
                                </td>
                                <td>
                                    <div>66-69</div>
                                </td>
                                <td>
                                    <div>92-95</div>
                                </td>
                            </tr>
                            <tr class="data-size">
                                <td>
                                    <div>44-ULTRA</div>
                                </td>
                                <td>
                                    <div>38/170</div>
                                </td>
                                <td>
                                    <div>86-89</div>
                                </td>
                                <td>
                                    <div>65-68</div>
                                </td>
                                <td>
                                    <div>88-91</div>
                                </td>
                            </tr>
                            <tr class="data-size">
                                <td>
                                    <div>46-ULTRA</div>
                                </td>
                                <td>
                                    <div>40/170</div>
                                </td>
                                <td>
                                    <div>90-93</div>
                                </td>
                                <td>
                                    <div>69-72</div>
                                </td>
                                <td>
                                    <div>92-95</div>
                                </td>
                            </tr>
                            <tr class="data-size">
                                <td>
                                    <div>48-ULTRA</div>
                                </td>
                                <td>
                                    <div>42/170</div>
                                </td>
                                <td>
                                    <div>94-97</div>
                                </td>
                                <td>
                                    <div>73-76</div>
                                </td>
                                <td>
                                    <div>96-99</div>
                                </td>
                            </tr>
                            <tr class="data-size">
                                <td>
                                    <div>50-ULTRA</div>
                                </td>
                                <td>
                                    <div>44/170</div>
                                </td>
                                <td>
                                    <div>98-101</div>
                                </td>
                                <td>
                                    <div>77-80</div>
                                </td>
                                <td>
                                    <div>100-103</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered">
                @if($product['brand'])
                    <tr>
                        <td>Бренд</td>
                        <td>{{$product->brands['name']}}</td>
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
            @foreach($reviews as $review)
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__field product__review-img">
                            <div style="width:{{$review['star']*100/5}}%"></div>
                        </div>
                        @if(auth()->id() && $review['uid']==auth()->id())
                            <?php $hasUserReview = true; ?>
                            <form method="post" action="{{route('user.review.destroy', $review['id'])}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Вы действительно хотите удалить?')"
                                        class="btn btn-link"
                                        type="submit">Удалить мой отзыв
                                </button>
                            </form>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="product__field product__review-text">
                            {{$review['text']}}
                        </div>

                    </div>
                </div>
            @endforeach
            @if(!$hasUserReview)
                <form action="{{route('user.review.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="pid" value="{{$product['id']}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{--<input required type="range" name="star" min="1" max="5">--}}
                                <fieldset class="review">
                                    <input type="radio" id="star5" name="star" value="5">
                                    <label for="star5"
                                           title="Отлично">5</label>
                                    <input type="radio" id="star4" name="star" value="4">
                                    <label for="star4"
                                           title="Очень хорошо">4</label>
                                    <input type="radio" id="star3" name="star" value="3">
                                    <label for="star3"
                                           title="Хорошо">3</label>
                                    <input type="radio" id="star2" name="star" value="2">
                                    <label for="star2"
                                           title="Удовлетворительно">2</label>
                                    <input type="radio" id="star1" name="star" value="1">
                                    <label for="star1"
                                           title="Плохо">1</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-text" class="col-form-label"></label>
                        <textarea id="review-text" placeholder="Введите отзыв" required name="text"
                                  class="form-control">{{old('text')}}</textarea>

                    </div>
                    <button type="submit" class="btn btn-success">
                        Добавить
                    </button>
                </form>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <link href="/css/jquery.exzoom.css" rel="stylesheet">
    <script src="/js/jquery.exzoom.js"></script>
    <script>
        $(function () {
            $("#exzoom").exzoom({
                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                // autoplay
                "autoPlay": false,
                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000
            });
        });
    </script>
@endsection

