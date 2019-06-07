@extends('layouts.app')

@section('title', "Cart")



@section('content')
    {{dd($cart)}}
    @foreach($cart as $products)
        @foreach($products as $key => $product)
            <div>{{$key}} => {{$product}}</div>
        @endforeach
    @endforeach
@endsection