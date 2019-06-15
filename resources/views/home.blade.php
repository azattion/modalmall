@extends('layouts.app')

@section('title', "Home page")

@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <img class="img-fluid" src="/img/slider.png" alt="Спецпредложения и новинки">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="/img/slider.png" alt="Спецпредложения и новинки">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="/img/slider.png" alt="Спецпредложения и новинки">
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
            @foreach($categories as $category)
                <div class="col-md-3">
                    <a href="{{route('products.category', $category['id'])}}">
                        @if(isset($category->images[0]))
                            <img class="img-fluid"
                                 src="/storage{{$category->images[0]['path']}}/{{$category->images[0]['name']}}.{{$category->images[0]['ext']}}">
                        @endif
                        <div class=""><img style="width: 40px;" src="/img/kids.png">{{$category['name']}}</div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-12">
                <h3 class="text-center">Бестселлеры</h3>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3">
                            <a href="{{route('products.show', ['id' => $product['id']])}}">
                                @if(isset($product->images[0]))
                                    <img class="img-fluid"
                                         src="/storage{{$product->images[0]['path']}}/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
                                @endif
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
        </div>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <style>
        .swiper-container {
            width: 1100px;
            height: 376px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <script>
        $(document).ready(function () {
            var mySwiper = new Swiper('.swiper-container', {
                // Optional parameters
                loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
        });
    </script>
@endsection