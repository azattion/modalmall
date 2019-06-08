@extends('layouts.app')

@section('title', "Search")

@section('content')
    <div class="col-md-12">
        <h3 class="text-center">Поиск</h3>
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
@endsection