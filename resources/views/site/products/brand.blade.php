@extends('layouts.app')

@section('title', "Бренды")

@section('content')
    <h1>Бренды</h1>
    <div class="row">
        @foreach($brands as $brand)
            <div class="col-sm-3">
                <div class="brand-card text-center">
                    <a href="{{route('products.category', 0)}}?brand={{$brand['id']}}">
                        @if(isset($brand->images[0]))
                            <img style="width: 100px"
                                 src="/storage{{$brand->images[0]['path']}}/md/{{$brand->images[0]['name']}}.{{$brand->images[0]['ext']}}">
                        @else
                            <img class="img-fluid" style="width: 120px"
                                 src="http://www.scppa.org/image.axd?picture=/2018/04/photo_not_available.png">
                        @endif
                        <div class="brand-card__name">{{$brand['name']}}</div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
