@extends('layouts.app')

@section('title', "Search")

@section('content')
    <div class="col-md-12">
        <h3 class="text-center">Поиск</h3>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    @include('layouts.product-cart', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
@endsection