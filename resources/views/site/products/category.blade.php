@extends('layouts.app')

@section('title', "Category item")

@section('content')
    <div class="row">
        <div class="col-sm-2">
            @if(isset($categories) && count($categories))
                <div style="background-color: #EA6385">
                    <ul class="category-nav list-unstyled">
                        @foreach($categories as $cat)
                            <li class="category-nav__item"><a class="category-nav__link"
                                                              href="{{route('products.category', $cat['id'])}}">{{$cat['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-sm-10">
            <h3 class="text-left">{{isset($category['name'])?$category['name']:''}}</h3>
            <div class="row">
                @if($category)
                    <div class="col-sm text-left">
                        <label for="sort">Сортировать по:
                            <select name="sort" id="sort">
                                <option value="{{route('products.category', $category['id'])}}?sort=top&order=up">
                                    Популярные
                                </option>
                                <option value="{{route('products.category', $category['id'])}}?sort=cost&order=desc">По
                                    цене
                                </option>
                                <option value="{{route('products.category', $category['id'])}}?sort=cost&order=asc">По
                                    цене
                                </option>
                            </select>
                        </label>
                    </div>
                @endif
                <div class="col-sm text-right">
                    <label for="size">Размер: <br>
                        <select name="size" id="size">
                            <option value="0">...</option>
                            @php $sizes = config('services.sizes') @endphp
                            @foreach($sizes as $key=>$size)
                                <option value="{{$key}}">{{$size}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="col-sm text-right">
                    <label for="brand">Бренд: <br>
                        <select name="brand" id="brand">
                            <option value="0">...</option>
                            {{--@php $brands = config('services.brands') @endphp--}}
                            @foreach($brands as $brand)
                                <option @if(isset($_GET['brand']) && $_GET['brand'] == $brand['id']) selected
                                        @endif value="{{$brand['id']}}">{{$brand['name']}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="col-sm text-right">
                    <label for="collection">Производитель: <br>
                        <select name="collection" id="collection">
                            <option value="0">...</option>
                            @php $producers = config('services.producers') @endphp
                            @foreach($producers as $key=>$producer)
                                <option value="{{$key}}">{{$producer}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        @include('layouts.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
            <div class="no-margin pull-right">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection