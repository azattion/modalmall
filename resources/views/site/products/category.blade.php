@extends('layouts.app')

@section('title', "Category item - {$category['name']}")

@section('content')
    <div class="col-md-12">
        <h3 class="text-center">{{$category['name']}}</h3>
        <div class="row">
            <div class="col-md-12">
                Сортировка:
                <a href="{{route('products.category', $category['id'])}}?sort=top&order=up">Популярные</a>
                <a href="{{route('products.category', $category['id'])}}?sort=price&order=desc">По цене</a>
                <a href="{{route('products.category', $category['id'])}}?sort=price&order=asc">По цене</a>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)

                <div class="col-md-3">
                    <a href="{{route('products.show', ['id' => $product['id']])}}">
                        <img class="img-fluid"
                             src="/storage{{$product['images'][0]['path']}}/{{$product['images'][0]['name']}}.{{$product['images'][0]['ext']}}">
                        @if($product['as_new'])
                            <span class="badge badge-primary">Новинка</span>
                        @endif
                        @if($product['sale'])
                            <span class="badge badge-primary">Скидка</span>
                        @endif
                        {{$product['name']}}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection