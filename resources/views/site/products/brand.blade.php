@extends('layouts.app')

@section('title', "Бренды")

@section('content')
    <h1>Бренды</h1>
    <div class="row">
        @foreach($brands as $brand)
            <div class="col-sm-4">
                <div class="brand-card">
                    <a href="{{route('products.category', 0)}}?brand={{$brand['id']}}">
                        @if(isset($brand->images[0]))
                            <img style="width: 100px"
                                 src="/storage{{$brand->images[0]['path']}}/md/{{$brand->images[0]['name']}}.{{$brand->images[0]['ext']}}">
                        @endif
                        <div class="brand-card__name">{{$brand['name']}}</div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
