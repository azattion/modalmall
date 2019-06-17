@extends('layouts.app')

@section('title', "Category item - {$category['name']}")

@section('content')
    <div class="row">
        <div class="col-sm-2">
            <ul class="list-unstyled">
                <li><a href="{{route('products.category', 1)}}">Category 1</a></li>
                <li><a href="{{route('products.category', 2)}}">Category 2</a></li>
                <li><a href="{{route('products.category', 3)}}">Category 3</a></li>
            </ul>
        </div>
        <div class="col-sm-10">
            <h3 class="text-center">{{$category['name']}}</h3>
            <div class="row">
                <div class="col-sm">
                    Сортировка:
                    <a href="{{route('products.category', $category['id'])}}?sort=top&order=up">Популярные</a>
                    <a href="{{route('products.category', $category['id'])}}?sort=price&order=desc">По цене</a>
                    <a href="{{route('products.category', $category['id'])}}?sort=price&order=asc">По цене</a>
                </div>
                <div class="col-sm">
                    <select name="producers" id="producers">
                        <option value="0">...</option>
                        @php $producers = config('services.producers') @endphp
                        @foreach($producers as $key=>$producer)
                            <option value="{{$key}}">{{$producer}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm">
                    <select name="brand" id="brand">
                        <option value="0">...</option>
                        @php $brands = config('services.brands') @endphp
                        @foreach($brands as $key=>$brand)
                            <option value="{{$key}}">{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm">
                    <select name="size" id="size">
                        <option value="0">...</option>
                        @php $sizes = config('services.sizes') @endphp
                        @foreach($sizes as $key=>$size)
                            <option value="{{$key}}">{{$size}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm"></div>
                <div class="col-sm"></div>
            </div>
            <div class="row">
                @foreach($products as $product)

                    <div class="col-md-3">
                        @include('layouts.product-cart', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection