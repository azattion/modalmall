@extends('layouts.app')

@section('page_title', $product['meta_title']??$product['name'])
@section('page_desc', $product['meta_desc'])
@section('page_url', route('products.show', $product['id']))
@section('page_keywords', $product['meta_keywords'])

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
                        <img class="img-fluid"
                             src="/img/image-404.png">
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
            <div class="product__field product__review">
                @if($product->average_rating)
                    <div class="product__review-value">{{number_format($product->average_rating, 1)}}</div>
                @endif
                <div class="product__review-img">
                    <div style="width: @if($product->average_rating) {{$product->average_rating*100/5}}% @else 0% @endif"></div>
                </div>
                @if(count($product->reviews))
                    <a href="#product-reviews">Отзывов: {{count($product->reviews)}}</a>
                @endif
                <a href="#product-reviews">Оценить</a>
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

            @if(auth()->check())
                @if($product->favorite)
                    <form action="{{route('user.favorite.destroy', $product->favorite['id'])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="pid" value="{{$product['id']}}">
                        <button onclick="return confirm('Вы действительно хотите удалить?')" type="submit"
                                class="btn btn-link">
                            <img style="width: 25px" src="data:image/svg+xml;base64,
    PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iNTEyIiB2aWV3Qm94PSItNTYgMCA1MTIgNTEyLjAwMDAxIiB3aWR0aD0iNTEyIj48Zz48cGF0aCBkPSJtMTg0Ljc1NzgxMiAzMTQuNTc4MTI1YzAtNC4wMjM0MzcgMS41OTc2NTctNy44ODY3MTkgNC40Mzc1LTEwLjcyNjU2M2wxNi44MDQ2ODgtMTYuODAwNzgxLTI3LjMzOTg0NC0yNy4zMzk4NDNjLTUuOTI1NzgxLTUuOTE0MDYzLTUuOTI1NzgxLTE1LjUxOTUzMiAwLTIxLjQ0NTMxM2wyNy4zOTA2MjUtMjcuMzg2NzE5LTE2LjYwMTU2Mi0xNS44NjMyODFjLTMuMDAzOTA3LTIuODU5Mzc1LTQuNjkxNDA3LTYuODI0MjE5LTQuNjkxNDA3LTEwLjk2ODc1di03NC42NjQwNjNjLTQzLjI2MTcxOC0zOS40OTIxODctMTEwLjU3NDIxOC0zOC4zMTY0MDYtMTUyLjQwMjM0MyAzLjUwNzgxMy00My4xMzI4MTMgNDMuMTMyODEzLTQzLjE0ODQzOCAxMTIuOTQ5MjE5IDAgMTU2LjA4MjAzMWwxNTIuNDAyMzQzIDE1Mi40MTAxNTZ6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRUU2Njg4IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0zNjcuNDg4MjgxIDExMi44OTA2MjVjLTQxLjgyNDIxOS00MS44MjQyMTktMTA5LjE0MDYyNS00My0xNTIuNDAyMzQzLTMuNTA3ODEzdjY4LjE4MzU5NGwyMy4xMzI4MTIgMjIuMTAxNTYzYzYuMTM2NzE5IDUuODYzMjgxIDYuMjY1NjI1IDE1LjY4MzU5My4yNDIxODggMjEuNjgzNTkzbC0yNy42Mjg5MDcgMjcuNjQwNjI2IDI3LjMzNTkzOCAyNy4zMzk4NDNjNS45MjU3ODEgNS45MjU3ODEgNS45MjU3ODEgMTUuNTE5NTMxIDAgMjEuNDQ1MzEzbC0yMy4wODIwMzEgMjMuMDgyMDMxdjEwMC41MjM0MzdsMTUyLjQwMjM0My0xNTIuNDEwMTU2YzQzLjE0NDUzMS00My4xMjEwOTQgNDMuMTQ0NTMxLTExMi45NDE0MDYgMC0xNTYuMDgyMDMxem0wIDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0VFNjY4OCIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD48cGF0aCBkPSJtMTk5LjkyMTg3NSA0NTQuNDUzMTI1Yy04LjM3NSAwLTE1LjE2NDA2MyA2Ljc4OTA2My0xNS4xNjQwNjMgMTUuMTY0MDYzdjI3LjIxODc1YzAgOC4zNzUgNi43ODkwNjMgMTUuMTY0MDYyIDE1LjE2NDA2MyAxNS4xNjQwNjJzMTUuMTY0MDYzLTYuNzg5MDYyIDE1LjE2NDA2My0xNS4xNjQwNjJ2LTI3LjIxODc1YzAtOC4zNzUtNi43ODkwNjMtMTUuMTY0MDYzLTE1LjE2NDA2My0xNS4xNjQwNjN6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRUU2Njg4IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0yNTcuNDA2MjUgNDUwLjU1NDY4OGMtNS45MjE4NzUtNS45MjE4NzYtMTUuNTIzNDM4LTUuOTIxODc2LTIxLjQ0NTMxMiAwLTUuOTI1NzgyIDUuOTIxODc0LTUuOTI1NzgyIDE1LjUyMzQzNyAwIDIxLjQ0OTIxOGwyNS4xNDA2MjQgMjUuMTQwNjI1YzUuOTIxODc2IDUuOTIxODc1IDE1LjUyMzQzOCA1LjkyMTg3NSAyMS40NDUzMTMgMHM1LjkyMTg3NS0xNS41MjM0MzcgMC0yMS40NDUzMTJ6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRUU2Njg4IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0xNDIuNDQxNDA2IDQ1MC41NTQ2ODgtMjUuMTQ0NTMxIDI1LjE0NDUzMWMtNS45MjE4NzUgNS45MjE4NzUtNS45MjE4NzUgMTUuNTIzNDM3IDAgMjEuNDQ1MzEyczE1LjUyMzQzNyA1LjkyMTg3NSAyMS40NDkyMTkgMGwyNS4xNDA2MjUtMjUuMTQwNjI1YzUuOTIxODc1LTUuOTI1NzgxIDUuOTIxODc1LTE1LjUyNzM0NCAwLTIxLjQ0OTIxOC01LjkyMTg3NS01LjkyMTg3Ni0xNS41MjM0MzgtNS45MjE4NzYtMjEuNDQ1MzEzIDB6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRUU2Njg4IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0xOTkuMjUzOTA2IDU1LjYwNTQ2OWM4LjM3NSAwIDE1LjE2NDA2My02Ljc4OTA2MyAxNS4xNjQwNjMtMTUuMTY0MDYzdi0yNS4yNzczNDRjMC04LjM3NS02Ljc4OTA2My0xNS4xNjQwNjItMTUuMTY0MDYzLTE1LjE2NDA2MnMtMTUuMTY3OTY4IDYuNzg5MDYyLTE1LjE2Nzk2OCAxNS4xNjQwNjJ2MjUuMjc3MzQ0YzAgOC4zNzUgNi43OTI5NjggMTUuMTY0MDYzIDE1LjE2Nzk2OCAxNS4xNjQwNjN6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRUU2Njg4IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0yNDguNDE3OTY5IDYxLjYyMTA5NCAyOS42MDE1NjItMjkuNjAxNTYzYzUuOTIxODc1LTUuOTIxODc1IDUuOTIxODc1LTE1LjUyMzQzNyAwLTIxLjQ0OTIxOS01LjkyMTg3NS01LjkyMTg3NC0xNS41MjM0MzctNS45MjE4NzQtMjEuNDQ1MzEyIDBsLTI5LjYwMTU2MyAyOS42MDE1NjNjLTUuOTIxODc1IDUuOTIxODc1LTUuOTIxODc1IDE1LjUyMzQzNyAwIDIxLjQ0OTIxOSA1LjkyMTg3NSA1LjkyMTg3NSAxNS41MjM0MzggNS45MjE4NzUgMjEuNDQ1MzEzIDB6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRUU2Njg4IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0xNTAuMDg1OTM4IDYxLjYyMTA5NGM1LjkyNTc4MSA1LjkyMTg3NSAxNS41MjM0MzcgNS45MjE4NzUgMjEuNDQ5MjE4IDAgNS45MjE4NzUtNS45MjE4NzUgNS45MjE4NzUtMTUuNTI3MzQ0IDAtMjEuNDQ5MjE5bC0yOS42MDE1NjItMjkuNjAxNTYzYy01LjkyMTg3NS01LjkxNzk2OC0xNS41MjM0MzgtNS45MjE4NzQtMjEuNDQ1MzEzIDAtNS45MjU3ODEgNS45MjE4NzYtNS45MjU3ODEgMTUuNTI3MzQ0IDAgMjEuNDQ5MjE5em0wIDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0VFNjY4OCIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD48L2c+IDwvc3ZnPg=="/>
                            Удалить из избранных
                        </button>
                    </form>
                @else
                    <form action="{{route('user.favorite.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="pid" value="{{$product['id']}}">
                        <button type="submit" class="btn btn-link">
                            <img style="width: 25px" src="data:image/svg+xml;base64,
    PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEuOTk3IDUxLjk5NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEuOTk3IDUxLjk5NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIj48Zz48cGF0aCBkPSJNNTEuOTExLDE2LjI0MkM1MS4xNTIsNy44ODgsNDUuMjM5LDEuODI3LDM3LjgzOSwxLjgyN2MtNC45MywwLTkuNDQ0LDIuNjUzLTExLjk4NCw2LjkwNSAgYy0yLjUxNy00LjMwNy02Ljg0Ni02LjkwNi0xMS42OTctNi45MDZjLTcuMzk5LDAtMTMuMzEzLDYuMDYxLTE0LjA3MSwxNC40MTVjLTAuMDYsMC4zNjktMC4zMDYsMi4zMTEsMC40NDIsNS40NzggIGMxLjA3OCw0LjU2OCwzLjU2OCw4LjcyMyw3LjE5OSwxMi4wMTNsMTguMTE1LDE2LjQzOWwxOC40MjYtMTYuNDM4YzMuNjMxLTMuMjkxLDYuMTIxLTcuNDQ1LDcuMTk5LTEyLjAxNCAgQzUyLjIxNiwxOC41NTMsNTEuOTcsMTYuNjExLDUxLjkxMSwxNi4yNDJ6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNFRTY2ODgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+PC9nPiA8L3N2Zz4="/>
                            В избранное
                        </button>
                    </form>
                @endif
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
                        <table class="table table-striped" align="center" width="100%">
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
            <div class="product__reviews" id="product-reviews">
                <h5>Отзывы</h5>
                <?php $hasUserReview = 0; ?>
                @foreach($product->reviews as $review)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product__field product__review-img">
                                <div style="width:{{$review['star']*100/5}}%"></div>
                            </div>
                            @if(auth()->id() && $review['uid']==auth()->id())
                                <?php $hasUserReview = 1; ?>
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
                            {{--<label for="review-text" class="col-form-label"></label>--}}
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

