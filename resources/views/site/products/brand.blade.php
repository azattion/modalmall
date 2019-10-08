@extends('layouts.app')

{{--@section('page_title', $brand['meta_title']??$brand['name'])--}}
{{--@section('page_desc', $post['meta_desc'])--}}
{{--@section('page_url', route('posts.show', $post['id']))--}}
{{--@section('page_keywords', $post['meta_keywords'])--}}

@section('content')
    <h1>Бренды</h1>
    <div class="row">
        @foreach($brands as $brand)
            <div class="col-sm-4">
                <div class="brand-card text-center">
                    <a title="{{$brand['name']}}" href="{{route('products.category', 0)}}?brand={{$brand['id']}}">
                        @if(isset($brand->images[0]))
                            <div class="brand-card__img" style="background-image: url(/storage{{$brand->images[0]['path']}}/md/{{$brand->images[0]['name']}}.{{$brand->images[0]['ext']}})"></div>
                            {{--<img class="img-fluid" style="width: 200px"--}}
                                 {{--src="/storage{{$brand->images[0]['path']}}/md/{{$brand->images[0]['name']}}.{{$brand->images[0]['ext']}}">--}}
                        @else
                            <div class="brand-card__img" style="background-image: url(/img/notfoundphoto.jpg)"></div>
                            {{--<img class="brand-card__img img-fluid" style="width: 120px"--}}
                                 {{--src="/img/notfoundphoto.jpg">--}}
                        @endif
                        <div class="brand-card__name">{{$brand['name']}}</div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
