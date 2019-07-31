@extends('layouts.app')

@section('page_title', "Home page")

@section('content')
    {{--<div class="container">--}}
    <div class="row">
        <div class="col-md-12">
            @if($posts)
                    <!-- Slider main container -->
            <div class="swiper-container post-swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($posts as $post)
                        @foreach($post->images as $image)
                            <a href="{{route('posts.show', $post['id'])}}" class="swiper-slide"
                               style="background-image: url(/storage{{$image['path']}}/lg/{{$image['name']}}.{{$image['ext']}})">
                                {{--<a href="{{route('posts.show', $post['id'])}}">--}}
                                {{--<img class="img-fluid"--}}
                                {{--src="/storage{{$image['path']}}/lg/{{$image['name']}}.{{$image['ext']}}"--}}
                                {{--alt="{{$post['title']}}">--}}
                                {{--</a>--}}
                            </a>
                        @endforeach
                    @endforeach
                </div>
                {{--<div class="swiper-pagination"></div>--}}
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            @endif
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md text-md-center">
                    @include('layouts.category-card', ['category' => $category])
                </div>
            @endforeach
        </div>
        {{--<div class="row" style="margin-top: 30px">--}}
            <h2 style="margin-bottom: 0" class="col-md-12 header-title__italic text-center">Бестселлеры</h2>
            {{--<div class="col-md-12">--}}
                {{--<div class="row product-row">--}}
                    <div class="top-swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($products as $product)
                                <div class="top-swiper-slide">
                                    @include('layouts.product-card', ['product' => $product])
                                </div>
                                <div class="top-swiper-slide">
                                    @include('layouts.product-card', ['product' => $product])
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    {{--</div>--}}
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <style>
        .post-swiper {
            /*width: 1100px;*/
            /*height: 340px;*/
            border: 2px solid #EC6687;
            border-radius: 3px;
            margin: 15px auto;
        }

        .top-swiper-container {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            list-style: none;
            padding: 0;
            z-index: 1;
        }

        .top-swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <script>
        $(document).ready(function () {
            var swiper1 = new Swiper('.swiper-container', {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                }
            });
            var swiper2 = new Swiper('.top-swiper-container', {
                slidesPerView: 4,
                spaceBetween: 30,
                slidesPerGroup: 4,
                freeMode: true,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
            console.log(swiper2);
        });
    </script>
    <style>
        .swiper-slide {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .swiper-slide:after {
            content: '';
            display: block;
            padding-top: 33.25%;
        }
    </style>
@endsection