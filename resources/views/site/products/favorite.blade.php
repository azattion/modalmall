@extends('layouts.app')

@section('title', "Favorite page")

@section('content')
    @foreach($favorites as $favorite)
        <div class="row">
            <div class="col-md-2">
                <a target="_blank" href="{{route('site.products.product', $favorite['prod_id'])}}">
                    Товар {{$favorite['prod_id']}}</a>
            </div>
            <div class="col-md-2"><a href="{{route('site.products.favorite-del', $favorite['prod_id'])}}"
                                     class="btn btn-primary">Удалить</a>
            </div>
        </div>
    @endforeach
@endsection