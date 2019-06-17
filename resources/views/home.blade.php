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
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-sm">
                        <div class="category">
                            <a href="{{route('products.category', $category['id'])}}">
                                @if(isset($category->images[0]))
                                    <img class="img-fluid"
                                         src="/storage{{$category->images[0]['path']}}/{{$category->images[0]['name']}}.{{$category->images[0]['ext']}}">
                                @else
                                    <img class="img-fluid" src="https://cdn.browshot.com/static/images/not-found.png">
                                @endif
                                <div class="category__caption text-center">
                                    <img style="width: 40px;" src="/img/kids.png">
                                    <span class="category__name">{{$category['name']}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="header-title__italic text-center">Бестселлеры</h2>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3">
                                @include('layouts.product-cart', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
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