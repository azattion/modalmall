@extends('layouts.app')

@section('title', "Home page")

@section('content')
    <div class="container">
        <div class="row">
            {{--<div class="col-md-12">--}}
            {{--<div class="card">--}}
            {{--<div class="card-header">Dashboard</div>--}}

            {{--<div class="card-body">--}}
            {{--@if (session('status'))--}}
            {{--<div class="alert alert-success" role="alert">--}}
            {{--{{ session('status') }}--}}
            {{--</div>--}}
            {{--@endif--}}

            {{--You are logged in!--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--        {{dd($images)}}--}}
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
                            <img class="img-fluid"
                                 src="/storage{{$category['images'][0]['path']}}/{{$category['images'][0]['name']}}.{{$category['images'][0]['ext']}}">
                            <a href="{{route('site.products.product', ['id' => $product['cat'], 'prod' => $product['id']])}}">{{$product['name']}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
