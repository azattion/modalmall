@extends('layouts.app')

@section('title', "Home page")

@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <img class="img-fluid" src="/img/slider.png" alt="Спецпредложения и новинки">
                </div>
            </div>
            @foreach($categories as $category)
                <div class="col-md-3">
                    <a href="{{route('site.products.category', $category['id'])}}">
                        <img class="img-fluid"
                             src="/storage{{$category['images'][0]['path']}}/{{$category['images'][0]['name']}}.{{$category['images'][0]['ext']}}">
                        <div class=""><img style="width: 40px;" src="/img/kids.png">{{$category['name']}}</div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-12">
                <h3 class="text-center">Бестселлеры</h3>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3">
                            <a href="{{route('site.products.product', ['id' => $product['id']])}}">
                                <img class="img-fluid"
                                 src="/storage{{$product['images'][0]['path']}}/{{$product['images'][0]['name']}}.{{$product['images'][0]['ext']}}">
                            {{$product['name']}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
