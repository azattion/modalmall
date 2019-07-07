@extends('layouts.app')

@section('page_title', "Home page")

@section('content')
    {{--<div class="container">--}}
        <div class="row">
            <div class="col-md-12">
                @if($posts)
                        <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($posts as $post)
                            @foreach($post->images as $image)
                                <div class="swiper-slide" style="background-image: url(/storage{{$image['path']}}/lg/{{$image['name']}}.{{$image['ext']}})">
                                    {{--<a href="{{route('posts.show', $post['id'])}}">--}}
                                        {{--<img class="img-fluid"--}}
                                             {{--src="/storage{{$image['path']}}/lg/{{$image['name']}}.{{$image['ext']}}"--}}
                                             {{--alt="{{$post['title']}}">--}}
                                    {{--</a>--}}
                                </div>
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
                    <div class="col-sm">
                        @include('layouts.category-card', ['category' => $category])
                    </div>
                @endforeach
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">
                    <h2 style="margin-bottom: 0" class="header-title__italic text-center">Бестселлеры</h2>
                    <div class="row product-row">
                        @foreach($products as $product)
                            <div class="col-md-3">
                                @include('layouts.product-card', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    {{--</div>--}}
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <style>
        .swiper-container {
            /*width: 1100px;*/
            /*height: 340px;*/
            border: 2px solid #EC6687;
            border-radius: 3px;
            margin: 15px auto;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <script>
        $(document).ready(function () {
            var mySwiper = new Swiper('.swiper-container', {
                // Optional parameters
                loop: true,

                // If we need pagination
//                pagination: {
//                    el: '.swiper-pagination',
//                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
        });
    </script>
    <style>
        .swiper-slide{
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .swiper-slide:after{
            content: '';
            display: block;
            padding-top: 33.25%;
        }
    </style>
@endsection