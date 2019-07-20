<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title', config('services.page_title')) - ModalMall</title>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<script src="/store/public/js/manifest.js"></script>--}}
    {{--<script src="/store/public/js/vendor.js"></script>--}}
    {{--TODO - Добавить актуальные данные--}}
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="keywords" content="@yield('page_keywords', config('services.page_keywords'))"/>
    <meta name="description" content="@yield('page_desc', config('services.page_desc'))"/>
    {{--<meta name="subject" content="your website's subject">--}}
    <meta name="copyright" content="ModalMall.ru">
    <meta name="language" content="ru">
    {{--<meta name="robots" content="index,follow"/>--}}
    {{--<meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm"/>--}}
    {{--<meta name="abstract" content="">--}}
    {{--<meta name="topic" content="">--}}
    {{--<meta name="summary" content="">--}}
    {{--<meta name="Classification" content="Business">--}}
    {{--<meta name="author" content="name, email@hotmail.com">--}}
    {{--<meta name="designer" content="">--}}
    {{--<meta name="copyright" content="">--}}
    {{--<meta name="reply-to" content="email@hotmail.com">--}}
    {{--<meta name="owner" content="">--}}
    <meta name="url" content="@yield('page_url', route('home'))">
    {{--<meta name="identifier-URL" content="http://www.websiteaddress.com">--}}
    {{--<meta name="directory" content="submission">--}}
    {{--<meta name="category" content="">--}}
    {{--<meta name="coverage" content="Worldwide">--}}
    {{--<meta name="distribution" content="Global">--}}
    {{--<meta name="rating" content="General">--}}
    {{--<meta name="revisit-after" content="7 days">--}}
    {{--<meta http-equiv="Expires" content="0">--}}
    {{--<meta http-equiv="Pragma" content="no-cache">--}}
    {{--<meta http-equiv="Cache-Control" content="no-cache">--}}

    <meta name="og:title" content="@yield('page_title', config('services.page_title'))"/>
    <meta name="og:type" content="website"/>
    <meta name="og:url" content="@yield('page_url', route('home'))"/>
    <meta name="og:image" content="@yield('page_img', config('services.page_img'))"/>
    <meta name="og:site_name" content="ModalMall.ru"/>
    <meta name="og:description" content="@yield('page_desc', config('services.page_desc'))"/>
    {{--TODO - App facebook page--}}
    {{--<meta name="fb:page_id" content="43929265776"/>--}}

    <link rel="alternate" type="application/rss+xml" title="RSS" href="{{route('rss')}}"/>
    <link rel="shortcut icon" type="image/png" href="/img/about.png"/>
    <link rel="fluid-icon" type="image/png" href="/img/about.png"/>
    {{--<link rel="me" type="text/html" href="http://google.com/profiles/thenextweb"/>--}}
    {{--<link rel='shortlink' href='http://blog.unto.net/?p=353'/>--}}
    {{--<link rel='archives' title='May 2003' href='http://blog.unto.net/2003/05/'/>--}}
    {{--<link rel='index' title='DeWitt Clinton' href='http://blog.unto.net/'/>--}}
    {{--<link rel='start' title='Pattern Recognition 1' href='http://blog.unto.net/photos/pattern_recognition_1_about/'/>--}}
    {{--<link rel='prev' title='OpenSearch and OpenID?  A sure way to get my attention.'--}}
    {{--href='http://blog.unto.net/opensearch/opensearch-and-openid-a-sure-way-to-get-my-attention/'/>--}}
    {{--<link rel='next' title='Not blog' href='http://blog.unto.net/meta/not-blog/'/>--}}
    {{--<link rel="search" href="/search.xml" type="application/opensearchdescription+xml" title="Viatropos"/>--}}

    {{--<link rel="self" type="application/atom+xml" href="http://www.syfyportal.com/atomFeed.php?page=3"/>--}}
    {{--<link rel="first" href="http://www.syfyportal.com/atomFeed.php"/>--}}
    {{--<link rel="next" href="http://www.syfyportal.com/atomFeed.php?page=4"/>--}}
    {{--<link rel="previous" href="http://www.syfyportal.com/atomFeed.php?page=2"/>--}}
    {{--<link rel="last" href="http://www.syfyportal.com/atomFeed.php?page=147"/>--}}

    {{--<link rel='shortlink' href='http://smallbiztrends.com/?p=43625'/>--}}
    {{--<link rel="canonical" href="http://smallbiztrends.com/2010/06/9-things-to-do-before-entering-social-media.html"/>--}}
    {{--<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://smallbiztrends.com/xmlrpc.php?rsd"/>--}}
    {{--<link rel="pingback" href="http://smallbiztrends.com/xmlrpc.php"/>--}}
    {{--<link media="only screen and (max-device-width: 480px)" href="http://wordpress.org/style/iphone.css" type="text/css"--}}
    {{--rel="stylesheet"/>--}}
    <style>
        a:hover {
            text-decoration: none;
        }

        select {
            background-color: #fff;
            border: 2px solid #6D2175;
            border-radius: 7px;
            padding: 0 5px;
            width: 100%;
        }

        @font-face {
            font-family: 'AG_Futura';
            font-style: normal;
            font-weight: 400;
            src: local('AG_Futura'), local('AG_Futura-Regular'),
                /*url(/font/AG_Futura.woff) format('woff'),*/ url(/font/AG_Futura.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Aquarelle';
            font-style: normal;
            font-weight: 400;
            src: local('Aquarelle'), local('Aquarelle'),
                /*url(/font/Aquarelle.woff) format('woff'),*/ url(/font/Aquarelle.ttf) format('truetype');
        }

        @font-face {
            font-family: 'AG_Futura Bold';
            font-style: normal;
            font-weight: 700;
            src: local('AG_Futura Bold'), local('AG_Futura Bold'),
                /*url(/font/AG_Futura_Bold.woff) format('woff'),*/ url(/font/AG_Futura_Bold.ttf) format('truetype');
        }

        .header-title__italic {
            font-family: 'Aquarelle', arial;
            color: #ee6688;
            font-size: 45px;
        }

        body {
            background-image: url(/img/content-bg-left.png), url(/img/content-bg-right.png), url(/img/footer-left-bottom-bg.png);
            background-repeat: no-repeat, no-repeat, no-repeat;
            background-position: left top, right top, left bottom;
            background-size: 100px 858px, 100px 681px, 542px 200px;
        }

        header {
            background-image: url(/img/header-bg-top-center.png), url(/img/header-bg-bottom-center.png);
            background-repeat: no-repeat, no-repeat;
            background-position: top center, bottom center;
            background-size: 804px 100px, 537px 100px;
            padding: 20px 0;
        }

        footer {
            background-image: url(/img/footer-right-bg.png);
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 100px 204px;
        }

        section {
            margin: 25px 0;
            min-height: 500px;
        }

        section h1 {
            margin-bottom: 1rem;
        }

        .header-nav__icon {
            margin-bottom: 5px;
        }

        .header-nav__item {
            line-height: 1;
        }

        .header-nav__link {
            color: #000;
        }

        .header-nav__name {
            display: block;
            text-transform: uppercase;
            font-size: 0.80rem;
        }

        .main-nav__link {
            color: #fff;
        }

        .main-nav__link:hover, .main-nav__link:focus, .main-nav__link:active {
            color: #FABBCB;
            text-decoration: none;
        }

        .footer-nav__link {
            color: #000;
            line-height: 1;
        }

        .footer-nav__item {
            line-height: 1;
        }

        .footer-nav__name {
            display: block;
            text-transform: uppercase;
        }

        .footer-nav__icon {
            margin-bottom: 5px;
        }

        nav {
            background-color: #ee6688;
            padding: 8px 0;
        }

        nav a {
            font-family: 'AG_Futura Bold', arial;
            font-weight: bold;
            color: #fff;
        }

        .category-card__name {
            background-color: #ee6688;
            color: #fff;
            font-weight: bold;
            padding: 0 8px 0 10px;
            border-radius: 1px;
        }

        .category-card__icon {
            position: relative;
            right: -5px;
        }

        .category-card {
            padding: 0 20px;
        }

        .category-card__cover {
            height: 200px;
        }

        .category-card__img {
            max-height: 100%;
        }

        div.swiper-button-prev, div.swiper-button-next {
            width: 44px;
            background-size: 44px 44px;
        }

        div.swiper-button-prev {
            background-image: url('/img/arrow-left.png');
        }

        div.swiper-button-next {
            background-image: url('/img/arrow-right.png');
        }

        .product-card {
            position: relative;
        }

        .product-card {
            /*content: ' ';*/
            /*display: block;*/
            /*width: 100%;*/
            /*height: 100%;*/
            /*top: -100px;*/
            padding: 42px 52px 0;
            background: url(/img/cart-1.png) top/100% no-repeat;
        }

        .product__img {
            padding: 53px 61px 51px;
            display: inline-block;
            /*height: 280px;*/
            background: url(/img/cart-3.png) top/100% no-repeat;
        }

        .product__img.product-img-full {
            position: relative;
            top: -45px;
        }

        .product__cost {
            font-size: 30px;
            font-weight: bold;
        }

        .product__images .product__img {
            width: 100px;
            float: left;
            padding: 20px;
            height: 120px;
        }

        .product__images .product__img:nth-child(1n) {
            background: url(/img/cart-1.png) top/100% no-repeat;
        }

        .product__images .product__img:nth-child(2n) {
            background: url(/img/cart-2.png) top/100% no-repeat;
        }

        .product__images .product__img:nth-child(3n) {
            background: url(/img/cart-3.png) top/100% no-repeat;
        }

        .product-row > div:nth-child(2n) .product-card {
            background-image: url("/img/cart-2.png");
        }

        .product-row > div:nth-child(3n) .product-card {
            background-image: url("/img/cart-3.png");
        }

        .product-row > div:nth-child(4n) .product-card {
            background-image: url("/img/cart-4.png");
        }

        .product-row > div {
            padding: 0;
        }

        .product__images {
            overflow: hidden;
        }

        .product_images_row {
            width: 3000px;
        }

        .product-card__new {
            position: absolute;
            right: 0;
            bottom: 0;
            margin-bottom: -30px;
            margin-right: -30px;
            width: 60px;
            z-index: 1;
        }

        .product-card__sale {
            position: absolute;
            right: 0;
            top: 0;
            margin-top: -30px;
            margin-right: -30px;
            width: 60px;
            z-index: 1;
        }

        .product-card__cover {
            /*border: 5px solid #f7b5bd;*/
            /*border-radius: 5px;*/
            position: relative;
            margin-bottom: 15px;
        }

        .product-card__cost {
            color: #000;
            font-weight: 700;
            font-family: 'AG_Futura Bold'
        }

        .product-card__name {
            color: #000;
            font-weight: 700;
            margin-bottom: 5px;
            font-family: 'AG_Futura Bold'
        }

        .product__cost_sale {
            text-decoration: line-through;
        }

        footer {
            border-top: 8px solid #f7b5bd;
            padding: 10px 0 0;
            background-color: #fff;
        }

        @media (min-width: 990px) {
            footer {
                /*position: fixed;*/
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 100;
            }

            nav.fixed {
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                z-index: 100;
            }

            body {
                /*padding-bottom: 145px;*/
            }
        }

        .footer-nav {
            margin: 8px 0;
        }

        .footer-copyright {
            padding: 5px 15px 5px 100px;
            color: #fff;
            background: -moz-linear-gradient(90deg, #FFFFFF 0, #F7B5BD 28%); /* FF3.6+ */
            background: -webkit-gradient(linear, 90deg, color-stop(0, FFFFFF), color-stop(28%, F7B5BD)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(90deg, #FFFFFF 0, #F7B5BD 28%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(90deg, #FFFFFF 0, #F7B5BD 28%); /* Opera 11.10+ */
            background: -ms-linear-gradient(90deg, #FFFFFF 0, #F7B5BD 28%); /* IE10+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#1301FE', endColorstr='#F4F60C', GradientType='1'); /* for IE */
            background: linear-gradient(90deg, #FFFFFF 0, #F7B5BD 28%); /* W3C */
        }

        .category-nav {
            padding: 10px;
        }

        .category-nav__link {
            color: #fff;
            font-size: 20px;
        }

        .category-nav__link:hover, .category-nav__link:focus, .category-nav__link:active {
            color: #FABBCB;
            text-decoration: none;
        }

        .cabinet-card {
            margin-bottom: 30px;
        }

        .cabinet-card__img {
            width: 130px;
            height: auto;
        }

        .cabinet-card__name {
            color: #491a79;
            font-size: 25px;
        }

        .cabinet-card__additional-link {
            display: inline-block;
            border-radius: 3px;
            padding: 0 5px;
            color: #000000;
            border: 1px solid #491a79;
        }

        .info-subtitle {
            color: #999;
        }

        .info-body {
            color: #333;
        }

        .review:not(:checked) > label {
            float: right;
            width: 1em;
            padding: 0 .1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 200%;
            line-height: 1.2;
            color: #ddd;
        }

        .review:not(:checked) > label:before {
            content: '★ ';
        }

        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .review {
            border: 0;
            position: relative;
            float: left
        }

        .review:not(:checked) > input {
            position: absolute;
            left: -9999px;
            clip: rect(0, 0, 0, 0)
        }

        .review:not(:checked) > label {
            float: right;
            width: 1em;
            padding: 0 .1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 200%;
            line-height: 1.2;
            color: #ddd
        }

        .review:not(:checked) > label:before {
            content: '★ '
        }

        .review > input:checked ~ label {
            color: #005f8e
        }

        .review:not(:checked) > label:hover, .review:not(:checked) > label:hover ~ label {
            color: #0095da
        }

        .review > input:checked + label:hover, .review > input:checked + label:hover ~ label, .review > input:checked ~ label:hover, .review > input:checked ~ label:hover ~ label, .review > label:hover ~ input:checked ~ label {
            color: #0095da
        }

        .review > label:active {
            position: relative;
            top: 2px;
            left: 2px
        }

        .product__review {
            margin-bottom: 30px
        }

        .product__review-img {
            width: 125px;
            float: left;
            margin-right: 5px;
            position: relative;
        }

        .product-card .product__review-img {
            margin: 0 auto;
            float: none;
        }

        .product__review-img div {
            height: 25px;
            background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCIgdmlld0JveD0iMCAwIDMwNiAzMDYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMwNiAzMDY7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8ZyBpZD0ic3Rhci1yYXRlIj4KCQk8cG9seWdvbiBwb2ludHM9IjE1MywyMzAuNzc1IDI0Ny4zNSwyOTkuNjI1IDIxMS42NSwxODcuNDI1IDMwNiwxMjEuMTI1IDE5MS4yNSwxMjEuMTI1IDE1Myw2LjM3NSAxMTQuNzUsMTIxLjEyNSAwLDEyMS4xMjUgICAgIDk0LjM1LDE4Ny40MjUgNTguNjUsMjk5LjYyNSAgICIgZmlsbD0iIzU4OTBmZiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=) left bottom;
            background-size: 25px;
        }

        .product__review-img:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            height: 25px;
            width: 125px;
            opacity: .3;
            background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCIgdmlld0JveD0iMCAwIDMwNiAzMDYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMwNiAzMDY7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8ZyBpZD0ic3Rhci1yYXRlIj4KCQk8cG9seWdvbiBwb2ludHM9IjE1MywyMzAuNzc1IDI0Ny4zNSwyOTkuNjI1IDIxMS42NSwxODcuNDI1IDMwNiwxMjEuMTI1IDE5MS4yNSwxMjEuMTI1IDE1Myw2LjM3NSAxMTQuNzUsMTIxLjEyNSAwLDEyMS4xMjUgICAgIDk0LjM1LDE4Ny40MjUgNTguNjUsMjk5LjYyNSAgICIgZmlsbD0iIzU4OTBmZiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=) left bottom;
            background-size: 25px
        }

        .product__review-value {
            float: left;
            margin-right: 10px;
            font-size: 25px
        }

        .col-review-act {
            margin-right: 30px;
            user-select: none
        }

        .product__review {
            vertical-align: middle;
            line-height: 28px
        }

        .product__name {
            border: 2px solid #411979;
            border-radius: 15px;
            padding: 0 10px;
        }

        .product__category {
            font-family: 'Aquarelle', arial;
            color: #ee6688;
            font-size: 45px;
        }

        .product__colors label {
            padding: 3px;
            border-radius: 5px;
            border: 2px solid #411979;
        }

        .product__colors input[type=radio]:checked + label {
            color: red;
        }

        .product__field {
            margin-bottom: 15px;
        }

        .product__qt {
            width: 50px !important;
        }

        #cart-product__qt {
            position: absolute;
            top: 0;
            right: 5px;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('home')}}"><img style="width: 245px" src="/img/logo.png" alt=""></a>
            </div>
            <div class="col-md-4">
                <form style="margin-top: 20px" action="{{route('products.category', 0)}}" method="get">
                    <div class="form-row">
                        <div class="col-10">
                            <input style="margin: 5px 0; border: 2px solid #411979; border-radius: 15px;" name="q"
                                   value="{{isset($_GET['q'])?$_GET['q']:''}}" class="form-control" type="text"
                                   placeholder="Введите слово..">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-link">
                                <img style="width: 35px" src="/img/search.png">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5 text-center">
                <ul class="header-nav list-unstyled row" style="margin-bottom: 0">
                    @php $menu = App\Menu::with('images')->where('type', 1)->where('status', 1)->get(); @endphp
                    <li class="header-nav__item col">
                        @if(auth()->check())
                            <a class="header-nav__link" href="/cabinet">
                                <img style="width: 60px" class="header-nav__icon"
                                     src="https://modalmall.ru/storage/images/45/LuPg4a9AkZ3ovDVWGIXwDpGghAGqY2T4JLVJmP93.png">
                                <span  class="header-nav__name">Личный кабинет</span>
                            </a>
                        @else
                            <a class="header-nav__link" href="/login">
                                <img style="width: 60px" class="header-nav__icon"
                                     src="https://modalmall.ru/storage/images/45/LuPg4a9AkZ3ovDVWGIXwDpGghAGqY2T4JLVJmP93.png">
                                <span  class="header-nav__name">Вход</span>
                            </a>
                        @endif
                    </li>
                    <li class="header-nav__item col">
                        <a class="header-nav__link" href="/cart">
                            <img style="width: 60px" class="header-nav__icon"
                                 src="https://modalmall.ru/storage/images/21/F7WTYZw3shpqfv1uzIVbSbszXjvUoHispHWfvf0O.png">
                            <span class="header-nav__name">
                                Корзина <span id="cart-product__qt"
                                              class="badge badge-success">@if(count(session()->get('cart', []))){{count(session()->get('cart', []))}}@endif</span>
                            </span>
                        </a>
                    </li>
                    @foreach($menu as $item)
                        <li class="header-nav__item col">
                            <a class="header-nav__link" href="{{$item['link']}}">
                                @if(isset($item->images[0]))
                                    <img class="header-nav__icon" alt="{{$item['title']}}" style="width: 60px"
                                         src="/storage{{$item->images[0]['path']}}/{{$item->images[0]['name']}}.{{$item->images[0]['ext']}}">
                                @endif
                                <span class="header-nav__name">{{$item['title']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>

<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="main-nav list-unstyled row" style="margin-bottom: 0">
                    @php $menu = App\Menu::where('type', 2)->where('status', 1)->get(); @endphp
                    @foreach($menu as $item)
                        <li class="main-nav__item col">
                            <a class="main-nav__link text-uppercase" href="{{$item['link']}}">{{$item['title']}}</a>
                        </li>
                    @endforeach
                    @if(auth()->user()['role']==1)
                        <li class="main-nav__item col">
                            <a target="_blank" class="main-nav__link text-uppercase" href="/admin">Админка</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

<section>
    <div class="container">
        <div class="col">
            @if ($message = Session::get('success'))
                <div class="pad margin no-print">
                    <div class="alert alert-success">
                        <h4><i class="fa fa-info"></i> Оповещения</h4>
                        {{$message}}
                    </div>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="pad margin no-print">
                    <div class="alert alert-danger">
                        <h4><i class="icon fa fa-ban"></i> Предупреждение</h4>
                        {{$message}}
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                Связаться с нами
                <br/>
                {{--<img class="img-fluid" src="/img/social-buttons.png" alt="Мы в соц сетях">--}}
                <a href="https://t.me/Modalmall">
                    <img style="width: 45px" src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48Zz48Y2lyY2xlIHN0eWxlPSJmaWxsOiM0MUI0RTY7IiBjeD0iMjU1Ljk5NyIgY3k9IjI1NiIgcj0iMjU1Ljk5NyIgZGF0YS1vcmlnaW5hbD0iIzQxQjRFNiIgY2xhc3M9IiI+PC9jaXJjbGU+PHBhdGggc3R5bGU9ImZpbGw6IzAwOTFDODsiIGQ9Ik01MTIsMjU2LjAwM2MwLTYuMjM4LTAuMjM1LTEyLjQxOS0wLjY3My0xOC41NDZMNDA1LjIyOCwxMzEuMzZMMTA2Ljc3MiwyNDguNzU5bDExNC4xOTEsMTE0LjE5MiAgbDEuNDk4LDUuMzkybDEuOTM5LTEuOTU1bDAuMDA4LDAuMDA4bC0xLjk0NywxLjk0N0wzNDguNzc4LDQ5NC42NkM0NDQuMjk4LDQ1Ny41LDUxMiwzNjQuNjYzLDUxMiwyNTYuMDAzeiIgZGF0YS1vcmlnaW5hbD0iIzAwOTFDOCIgY2xhc3M9IiI+PC9wYXRoPjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBwb2ludHM9IjIzMS4xMzgsMjkzLjMgMzQ2LjgyOSwzODAuNjQ3IDQwNS4yMjgsMTMxLjM2IDEwNi43NzEsMjQ4Ljc1OSAxOTcuNTg4LDI3OC44NCAgIDM2My4zMzEsMTY3LjY2NCAiIGRhdGEtb3JpZ2luYWw9IiNGRkZGRkYiIGNsYXNzPSIiPjwvcG9seWdvbj48cG9seWdvbiBzdHlsZT0iZmlsbDojRDJEMkQ3OyIgcG9pbnRzPSIxOTcuNTg4LDI3OC44NCAyMjIuNDYxLDM2OC4zNDQgMjMxLjEzOCwyOTMuMyAzNjMuMzMxLDE2Ny42NjQgIiBkYXRhLW9yaWdpbmFsPSIjRDJEMkQ3Ij48L3BvbHlnb24+PHBvbHlnb24gc3R5bGU9ImZpbGw6I0I5QjlCRSIgcG9pbnRzPSIyNjguNzM4LDMyMS42ODggMjIyLjQ2MSwzNjguMzQ0IDIzMS4xMzgsMjkzLjMgIiBkYXRhLW9yaWdpbmFsPSIjQjlCOUJFIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjQjlCOUJFIj48L3BvbHlnb24+PC9nPiA8L3N2Zz4="/>
                </a>
                <a href="https://api.whatsapp.com/send?phone=79898346581">
                    <img style="width: 45px" src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48Zz48cGF0aCBzdHlsZT0iZmlsbDojNENBRjUwOyIgZD0iTTI1Ni4wNjQsMGgtMC4xMjhsMCwwQzExNC43ODQsMCwwLDExNC44MTYsMCwyNTZjMCw1NiwxOC4wNDgsMTA3LjkwNCw0OC43MzYsMTUwLjA0OGwtMzEuOTA0LDk1LjEwNCAgbDk4LjQtMzEuNDU2QzE1NS43MTIsNDk2LjUxMiwyMDQsNTEyLDI1Ni4wNjQsNTEyQzM5Ny4yMTYsNTEyLDUxMiwzOTcuMTUyLDUxMiwyNTZTMzk3LjIxNiwwLDI1Ni4wNjQsMHoiIGRhdGEtb3JpZ2luYWw9IiM0Q0FGNTAiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCBzdHlsZT0iZmlsbDojRkFGQUZBIiBkPSJNNDA1LjAyNCwzNjEuNTA0Yy02LjE3NiwxNy40NC0zMC42ODgsMzEuOTA0LTUwLjI0LDM2LjEyOGMtMTMuMzc2LDIuODQ4LTMwLjg0OCw1LjEyLTg5LjY2NC0xOS4yNjQgIEMxODkuODg4LDM0Ny4yLDE0MS40NCwyNzAuNzUyLDEzNy42NjQsMjY1Ljc5MmMtMy42MTYtNC45Ni0zMC40LTQwLjQ4LTMwLjQtNzcuMjE2czE4LjY1Ni01NC42MjQsMjYuMTc2LTYyLjMwNCAgYzYuMTc2LTYuMzA0LDE2LjM4NC05LjE4NCwyNi4xNzYtOS4xODRjMy4xNjgsMCw2LjAxNiwwLjE2LDguNTc2LDAuMjg4YzcuNTIsMC4zMiwxMS4yOTYsMC43NjgsMTYuMjU2LDEyLjY0ICBjNi4xNzYsMTQuODgsMjEuMjE2LDUxLjYxNiwyMy4wMDgsNTUuMzkyYzEuODI0LDMuNzc2LDMuNjQ4LDguODk2LDEuMDg4LDEzLjg1NmMtMi40LDUuMTItNC41MTIsNy4zOTItOC4yODgsMTEuNzQ0ICBjLTMuNzc2LDQuMzUyLTcuMzYsNy42OC0xMS4xMzYsMTIuMzUyYy0zLjQ1Niw0LjA2NC03LjM2LDguNDE2LTMuMDA4LDE1LjkzNmM0LjM1Miw3LjM2LDE5LjM5MiwzMS45MDQsNDEuNTM2LDUxLjYxNiAgYzI4LjU3NiwyNS40NCw1MS43NDQsMzMuNTY4LDYwLjAzMiwzNy4wMjRjNi4xNzYsMi41NiwxMy41MzYsMS45NTIsMTguMDQ4LTIuODQ4YzUuNzI4LTYuMTc2LDEyLjgtMTYuNDE2LDIwLTI2LjQ5NiAgYzUuMTItNy4yMzIsMTEuNTg0LTguMTI4LDE4LjM2OC01LjU2OGM2LjkxMiwyLjQsNDMuNDg4LDIwLjQ4LDUxLjAwOCwyNC4yMjRjNy41MiwzLjc3NiwxMi40OCw1LjU2OCwxNC4zMDQsOC43MzYgIEM0MTEuMiwzMjkuMTUyLDQxMS4yLDM0NC4wMzIsNDA1LjAyNCwzNjEuNTA0eiIgZGF0YS1vcmlnaW5hbD0iI0ZBRkFGQSIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iI0ZBRkFGQSI+PC9wYXRoPjwvZz4gPC9zdmc+"/></a>
                <a href="https://www.instagram.com/buonumare_krd/">
                    <img style="width: 45px"
                         src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgaGVpZ2h0PSI1MTJweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTJweCI+PGxpbmVhckdyYWRpZW50IGlkPSJhIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjQyLjk2NjE1NjI2OCIgeDI9IjQ2OS4wMzM3NDc3IiB5MT0iNDY5LjAyOTY0NzcxNjgiIHkyPSI0Mi45NjIwNTYyODQ4Ij48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmZmQ2MDAiLz48c3RvcCBvZmZzZXQ9Ii41IiBzdG9wLWNvbG9yPSIjZmYwMTAwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZDgwMGI5Ii8+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9ImIiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMTYzLjA0Mjk5NTY0NTYiIHgyPSIzNDguOTUzOTA4MzQ2NCIgeTE9IjM0OC45NTM4MDgzMzEyIiB5Mj0iMTYzLjA0Mjg5NTYzMDQiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZmNjQwMCIvPjxzdG9wIG9mZnNldD0iLjUiIHN0b3AtY29sb3I9IiNmZjAxMDAiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNmZDAwNTYiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIzNzAuOTI5MTMyNTQzMiIgeDI9IjQxNC4zNzI3ODQ5OTEyIiB5MT0iMTQxLjA2NzY3MTQzMzYiIHkyPSI5Ny42MjQwMTg5ODU2Ij48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmMzAwNzIiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNlNTAwOTciLz48L2xpbmVhckdyYWRpZW50PjxwYXRoIGQ9Im01MTAuNDYwOTM4IDE1MC40NTMxMjVjLTEuMjQ2MDk0LTI3LjI1LTUuNTc0MjE5LTQ1Ljg1OTM3NS0xMS45MDIzNDQtNjIuMTQwNjI1LTYuNDI1NzgyLTE3LjA4MjAzMS0xNi41MDM5MDYtMzIuNTU0Njg4LTI5LjUyNzM0NC00NS4zNDM3NS0xMi43ODUxNTYtMTMuMDIzNDM4LTI4LjI2MTcxOS0yMy4xMDU0NjktNDUuMzQzNzUtMjkuNTM1MTU2LTE2LjI4NTE1Ni02LjMyNDIxOS0zNC44OTA2MjUtMTAuNjQ4NDM4LTYyLjE0MDYyNS0xMS44ODY3MTktMjcuMzAwNzgxLTEuMjUtMzYuMDIzNDM3LTEuNTQ2ODc1LTEwNS41NDY4NzUtMS41NDY4NzVzLTc4LjI0NjA5NC4yOTY4NzUtMTA1LjU0Njg3NSAxLjUzOTA2MmMtMjcuMjUgMS4yNDYwOTQtNDUuODU1NDY5IDUuNTc0MjE5LTYyLjE0MDYyNSAxMS45MDIzNDQtMTcuMDgyMDMxIDYuNDI1NzgyLTMyLjU1NDY4OCAxNi41MDM5MDYtNDUuMzQzNzUgMjkuNTI3MzQ0LTEzLjAyMzQzOCAxMi43ODUxNTYtMjMuMTA1NDY5IDI4LjI1NzgxMi0yOS41MzUxNTYgNDUuMzM5ODQ0LTYuMzI0MjE5IDE2LjI4NTE1Ni0xMC42NDg0MzggMzQuODk0NTMxLTExLjg4NjcxOSA2Mi4xNDA2MjUtMS4yNSAyNy4zMDQ2ODctMS41NDY4NzUgMzYuMDIzNDM3LTEuNTQ2ODc1IDEwNS41NDY4NzUgMCA2OS41MjczNDQuMjk2ODc1IDc4LjI1IDEuNTQ2ODc1IDEwNS41NTA3ODEgMS4yNDIxODcgMjcuMjQ2MDk0IDUuNTcwMzEzIDQ1Ljg1NTQ2OSAxMS44OTg0MzcgNjIuMTQwNjI1IDYuNDI1NzgyIDE3LjA3ODEyNSAxNi41MDM5MDcgMzIuNTU0Njg4IDI5LjUyNzM0NCA0NS4zMzk4NDQgMTIuNzg1MTU2IDEzLjAyMzQzNyAyOC4yNjE3MTkgMjMuMTAxNTYyIDQ1LjM0Mzc1IDI5LjUyNzM0NCAxNi4yODEyNSA2LjMzMjAzMSAzNC44OTA2MjUgMTAuNjU2MjUgNjIuMTQwNjI1IDExLjkwMjM0MyAyNy4zMDQ2ODggMS4yNDYwOTQgMzYuMDIzNDM4IDEuNTM5MDYzIDEwNS41NDY4NzUgMS41MzkwNjMgNjkuNTIzNDM4IDAgNzguMjQ2MDk0LS4yOTI5NjkgMTA1LjU0Njg3NS0xLjUzOTA2MyAyNy4yNS0xLjI0NjA5MyA0NS44NTU0NjktNS41NzAzMTIgNjIuMTQwNjI1LTExLjkwMjM0MyAzNC4zODY3MTktMTMuMjk2ODc2IDYxLjU3MDMxMy00MC40ODA0NjkgNzQuODY3MTg4LTc0Ljg2NzE4OCA2LjMzMjAzMS0xNi4yODUxNTYgMTAuNjU2MjUtMzQuODk0NTMxIDExLjkwMjM0NC02Mi4xNDA2MjUgMS4yNDIxODctMjcuMzA0Njg3IDEuNTM5MDYyLTM2LjAyMzQzNyAxLjUzOTA2Mi0xMDUuNTQ2ODc1IDAtNjkuNTI3MzQ0LS4yOTY4NzUtNzguMjQ2MDk0LTEuNTM5MDYyLTEwNS41NDY4NzV6bS00Ni4wODIwMzIgMjA4Ljk5NjA5NGMtMS4xMzY3MTggMjQuOTYwOTM3LTUuMzA4NTk0IDM4LjUxNTYyNS04LjgxMjUgNDcuNTM1MTU2LTguNjEzMjgxIDIyLjMyODEyNS0yNi4yNTc4MTIgMzkuOTcyNjU2LTQ4LjU4NTkzNyA0OC41ODU5MzctOS4wMTk1MzEgMy41MDM5MDctMjIuNTc0MjE5IDcuNjc1NzgyLTQ3LjUzNTE1NyA4LjgxMjUtMjYuOTg4MjgxIDEuMjM0Mzc2LTM1LjA4NTkzNyAxLjQ5MjE4OC0xMDMuNDQ1MzEyIDEuNDkyMTg4LTY4LjM2MzI4MSAwLTc2LjQ1NzAzMS0uMjU3ODEyLTEwMy40NDkyMTktMS40OTIxODgtMjQuOTU3MDMxLTEuMTM2NzE4LTM4LjUxMTcxOS01LjMwODU5My00Ny41MzUxNTYtOC44MTI1LTExLjExNzE4Ny00LjEwNTQ2OC0yMS4xNzU3ODEtMTAuNjQ4NDM3LTI5LjQzMzU5NC0xOS4xNTIzNDMtOC41MDM5MDYtOC4yNTc4MTMtMTUuMDQ2ODc1LTE4LjMxMjUtMTkuMTUyMzQzLTI5LjQzMzU5NC0zLjUwMzkwNy05LjAxOTUzMS03LjY3NTc4Mi0yMi41NzQyMTktOC44MTI1LTQ3LjUzNTE1Ni0xLjIzMDQ2OS0yNi45OTIxODgtMS40OTIxODgtMzUuMDg5ODQ0LTEuNDkyMTg4LTEwMy40NDUzMTMgMC02OC4zNTkzNzUuMjYxNzE5LTc2LjQ1MzEyNSAxLjQ5MjE4OC0xMDMuNDQ5MjE4IDEuMTQwNjI0LTI0Ljk2MDkzOCA1LjMwODU5My0zOC41MTU2MjYgOC44MTI1LTQ3LjUzNTE1NyA0LjEwNTQ2OC0xMS4xMjEwOTMgMTAuNjUyMzQzLTIxLjE3OTY4NyAxOS4xNTIzNDMtMjkuNDM3NSA4LjI1NzgxMy04LjUwMzkwNiAxOC4zMTY0MDctMTUuMDQ2ODc1IDI5LjQzNzUtMTkuMTQ4NDM3IDkuMDE5NTMxLTMuNTA3ODEzIDIyLjU3NDIxOS03LjY3NTc4MiA0Ny41MzUxNTctOC44MTY0MDYgMjYuOTkyMTg3LTEuMjMwNDY5IDM1LjA4OTg0My0xLjQ5MjE4OCAxMDMuNDQ1MzEyLTEuNDkyMTg4aC0uMDAzOTA2YzY4LjM1NTQ2OCAwIDc2LjQ1MzEyNS4yNjE3MTkgMTAzLjQ0OTIxOCAxLjQ5NjA5NCAyNC45NjA5MzggMS4xMzY3MTggMzguNTExNzE5IDUuMzA4NTk0IDQ3LjUzNTE1NyA4LjgxMjUgMTEuMTE3MTg3IDQuMTA1NDY4IDIxLjE3NTc4MSAxMC42NDg0MzcgMjkuNDMzNTkzIDE5LjE0ODQzNyA4LjUwMzkwNyA4LjI1NzgxMyAxNS4wNDY4NzYgMTguMzE2NDA3IDE5LjE0ODQzOCAyOS40Mzc1IDMuNTA3ODEyIDkuMDE5NTMxIDcuNjc5Njg4IDIyLjU3NDIxOSA4LjgxNjQwNiA0Ny41MzUxNTcgMS4yMzA0NjkgMjYuOTkyMTg3IDEuNDkyMTg4IDM1LjA4OTg0MyAxLjQ5MjE4OCAxMDMuNDQ1MzEyIDAgNjguMzU5Mzc1LS4yNTc4MTMgNzYuNDUzMTI1LTEuNDkyMTg4IDEwMy40NDkyMTl6bTAgMCIgZmlsbD0idXJsKCNhKSIvPjxwYXRoIGQ9Im0yNTUuOTk2MDk0IDEyNC41MzkwNjJjLTcyLjYwMTU2MyAwLTEzMS40NTcwMzIgNTguODU5Mzc2LTEzMS40NTcwMzIgMTMxLjQ2MDkzOHM1OC44NTU0NjkgMTMxLjQ1NzAzMSAxMzEuNDU3MDMyIDEzMS40NTcwMzFjNzIuNjA1NDY4IDAgMTMxLjQ2MDkzNy01OC44NTU0NjkgMTMxLjQ2MDkzNy0xMzEuNDU3MDMxcy01OC44NTU0NjktMTMxLjQ2MDkzOC0xMzEuNDYwOTM3LTEzMS40NjA5Mzh6bTAgMjE2Ljc5Mjk2OWMtNDcuMTI1LS4wMDM5MDYtODUuMzMyMDMyLTM4LjIwNzAzMS04NS4zMjgxMjUtODUuMzM1OTM3IDAtNDcuMTI1IDM4LjIwMzEyNS04NS4zMzIwMzIgODUuMzMyMDMxLTg1LjMzMjAzMiA0Ny4xMjg5MDYuMDAzOTA3IDg1LjMzMjAzMSAzOC4yMDcwMzIgODUuMzMyMDMxIDg1LjMzMjAzMiAwIDQ3LjEyODkwNi0zOC4yMDcwMzEgODUuMzM1OTM3LTg1LjMzNTkzNyA4NS4zMzU5Mzd6bTAgMCIgZmlsbD0idXJsKCNiKSIvPjxwYXRoIGQ9Im00MjMuMzcxMDk0IDExOS4zNDc2NTZjMCAxNi45NjQ4NDQtMTMuNzUzOTA2IDMwLjcxODc1LTMwLjcxODc1IDMwLjcxODc1LTE2Ljk2ODc1IDAtMzAuNzIyNjU2LTEzLjc1MzkwNi0zMC43MjI2NTYtMzAuNzE4NzUgMC0xNi45Njg3NSAxMy43NTM5MDYtMzAuNzIyNjU2IDMwLjcyMjY1Ni0zMC43MjI2NTYgMTYuOTY0ODQ0IDAgMzAuNzE4NzUgMTMuNzUzOTA2IDMwLjcxODc1IDMwLjcyMjY1NnptMCAwIiBmaWxsPSJ1cmwoI2MpIi8+PC9zdmc+Cg=="/>
                </a>
                <img style="width: 45px"
                     src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGNpcmNsZSBzdHlsZT0iZmlsbDojNkYzRkFBOyIgY3g9IjI1NiIgY3k9IjI1NiIgcj0iMjU2Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM1MTJEODQ7IiBkPSJNMzY3LjA2MSwxNDAuNDQzYy02Mi4zMTItMTUuMDUtMTI0LjczNS0zMi42NTQtMTg4LjYzNy0xMC4yODggIGMtNDEuMzc0LDE1LjUxNS00MS4zNzQsNjAuMzM3LTM5LjY1LDk4LjI2M2MwLDEwLjM0My0xMi4wNjcsMjQuMTM1LTYuODk2LDM2LjIwMmMxMC4zNDMsMzQuNDc4LDE4Ljk2Myw2OC45NTYsNTUuMTY1LDg2LjE5NSAgYzUuMTcyLDMuNDQ4LDAsMTAuMzQzLDMuNDQ4LDE1LjUxNWMtMS43MjQsMC01LjE3MiwxLjcyNC01LjE3MiwzLjQ0OGMwLDguMjYzLDMuNzA4LDIwLjkwMiwxLjI0NSwyOS4wNUwyOTYuNTcsNTA4Ljc4OCAgYzExMy4wOS0xOC4wMSwyMDEuNDc4LTExMC4wNjgsMjEzLjkxNC0yMjQuOTIxTDM2Ny4wNjEsMTQwLjQ0M3oiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTM5MS40MjcsMTc5LjkyNGwtMC4wODQtMC4zMzhjLTYuODQtMjcuNjUzLTM3LjY3OC01Ny4zMjUtNjUuOTk4LTYzLjQ5OGwtMC4zMTktMC4wNjYgICBjLTQ1LjgwNi04LjczOC05Mi4yNTEtOC43MzgtMTM4LjA0NywwbC0wLjMyOSwwLjA2NmMtMjguMzEsNi4xNzMtNTkuMTQ5LDM1Ljg0Ny02NS45OTgsNjMuNDk4bC0wLjA3NiwwLjMzOCAgIGMtOC40NTYsMzguNjE3LTguNDU2LDc3Ljc4MSwwLDExNi4zOThsMC4wNzYsMC4zMzhjNi41NTgsMjYuNDcyLDM1LjA5OSw1NC43ODIsNjIuMzYyLDYyLjU2N3YzMC44NjggICBjMCwxMS4xNzMsMTMuNjE1LDE2LjY2LDIxLjM1Nyw4LjU5N2wzMS4yNzUtMzIuNTA5YzYuNzg0LDAuMzc5LDEzLjU3MSwwLjU5MSwyMC4zNTYsMC41OTFjMjMuMDU3LDAsNDYuMTI1LTIuMTgxLDY5LjAyMy02LjU0OSAgIGwwLjMxOS0wLjA2NmMyOC4zMi02LjE3Myw1OS4xNTgtMzUuODQ3LDY1Ljk5OC02My40OThsMC4wODQtMC4zMzhDMzk5Ljg4MiwyNTcuNzA1LDM5OS44ODIsMjE4LjU0MywzOTEuNDI3LDE3OS45MjR6ICAgIE0zNjYuNjc2LDI5MC43MjNjLTQuNTY3LDE4LjA0MS0yNy45ODEsNDAuNDY5LTQ2LjU4NSw0NC42MTNjLTI0LjM1NSw0LjYzMi00OC45MDQsNi42MTEtNzMuNDI4LDUuOTMyICAgYy0wLjQ4OC0wLjAxNC0wLjk1NywwLjE3Ni0xLjI5NiwwLjUyNmMtMy40ODEsMy41NzItMjIuODM1LDIzLjQ0Mi0yMi44MzUsMjMuNDQybC0yNC4yODgsMjQuOTI4ICAgYy0xLjc3NiwxLjg1Mi00Ljg5NiwwLjU5MS00Ljg5Ni0xLjk2NHYtNTEuMTM2YzAtMC44NDUtMC42MDMtMS41NjItMS40MzMtMS43MjZjLTAuMDA1LTAuMDAyLTAuMDA5LTAuMDAyLTAuMDE0LTAuMDAzICAgYy0xOC42MDQtNC4xNDQtNDIuMDEtMjYuNTcyLTQ2LjU4NS00NC42MTNjLTcuNjExLTM0LjkwNi03LjYxMS03MC4yOTIsMC0xMDUuMTk4YzQuNTc1LTE4LjA0MSwyNy45ODEtNDAuNDY5LDQ2LjU4NS00NC42MTMgICBjNDIuNTM2LTguMDksODUuNjY0LTguMDksMTI4LjE5MSwwYzE4LjYxMyw0LjE0NCw0Mi4wMTgsMjYuNTcyLDQ2LjU4NSw0NC42MTNDMzc0LjI5NiwyMjAuNDMxLDM3NC4yOTYsMjU1LjgxNywzNjYuNjc2LDI5MC43MjN6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTI5Ni40NywzMTQuMzI3Yy0yLjg2LTAuODY5LTUuNTg1LTEuNDUyLTguMTE4LTIuNTAxYy0yNi4yMzEtMTAuODgzLTUwLjM3MS0yNC45MjMtNjkuNDkyLTQ2LjQ0NCAgIGMtMTAuODc0LTEyLjIzOC0xOS4zODUtMjYuMDU1LTI2LjU3OS00MC42NzdjLTMuNDEyLTYuOTM0LTYuMjg3LTE0LjEzOS05LjIxOC0yMS4yOTljLTIuNjcyLTYuNTI4LDEuMjY0LTEzLjI3Miw1LjQwOC0xOC4xOTIgICBjMy44ODktNC42MTcsOC44OTQtOC4xNDksMTQuMzE0LTEwLjc1NGM0LjIzLTIuMDMyLDguNDAyLTAuODYsMTEuNDkyLDIuNzI1YzYuNjc4LDcuNzUyLDEyLjgxNCwxNS45LDE3Ljc4LDI0Ljg4NiAgIGMzLjA1NSw1LjUyNywyLjIxNywxMi4yODMtMy4zMiwxNi4wNDRjLTEuMzQ2LDAuOTE0LTIuNTcyLDEuOTg4LTMuODI1LDMuMDJjLTEuMSwwLjkwNS0yLjEzNCwxLjgxOS0yLjg4OCwzLjA0NCAgIGMtMS4zNzcsMi4yNDEtMS40NDMsNC44ODYtMC41NTcsNy4zMjNjNi44MjcsMTguNzYxLDE4LjMzNCwzMy4zNTEsMzcuMjE5LDQxLjIxYzMuMDIyLDEuMjU3LDYuMDU2LDIuNzIsOS41MzgsMi4zMTUgICBjNS44My0wLjY4MSw3LjcxOC03LjA3NywxMS44MDQtMTAuNDE4YzMuOTkzLTMuMjY1LDkuMDk3LTMuMzA4LDEzLjM5OC0wLjU4NmM0LjMwMywyLjcyNCw4LjQ3Myw1LjY0NiwxMi42MTksOC42MDEgICBjNC4wNywyLjksOC4xMjEsNS43MzUsMTEuODc0LDkuMDQyYzMuNjEsMy4xNzksNC44NTMsNy4zNDksMi44MiwxMS42NjJjLTMuNzIsNy45MDEtOS4xMzUsMTQuNDcyLTE2Ljk0NCwxOC42NjggICBDMzAxLjU5LDMxMy4xNzgsMjk4Ljk1NiwzMTMuNTYxLDI5Ni40NywzMTQuMzI3QzI5My42MSwzMTMuNDU4LDI5OC45NTYsMzEzLjU2MSwyOTYuNDcsMzE0LjMyN3oiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMjU2LjA3MSwxNjUuNDI2YzM0LjMwOSwwLjk2Miw2Mi40OSwyMy43MzEsNjguNTI5LDU3LjY1MWMxLjAyOSw1Ljc4LDEuMzk1LDExLjY4OCwxLjg1MywxNy41NTUgICBjMC4xOTMsMi40NjctMS4yMDUsNC44MTEtMy44NjcsNC44NDRjLTIuNzUsMC4wMzMtMy45ODctMi4yNjktNC4xNjctNC43MzRjLTAuMzUzLTQuODgyLTAuNTk4LTkuNzg3LTEuMjcxLTE0LjYyNyAgIGMtMy41NTEtMjUuNTU5LTIzLjkzMS00Ni43MDQtNDkuMzcxLTUxLjI0MWMtMy44MjktMC42ODMtNy43NDUtMC44NjItMTEuNjI0LTEuMjY5Yy0yLjQ1MS0wLjI1Ny01LjY2MS0wLjQwNS02LjIwNC0zLjQ1MyAgIGMtMC40NTUtMi41NTUsMS43MDEtNC41ODksNC4xMzQtNC43MkMyNTQuNzQyLDE2NS4zOTMsMjU1LjQwNywxNjUuNDI0LDI1Ni4wNzEsMTY1LjQyNiAgIEMyOTAuMzgyLDE2Ni4zODgsMjU1LjQwNywxNjUuNDI0LDI1Ni4wNzEsMTY1LjQyNnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMzA4LjIxMiwyMzMuMDE5Yy0wLjA1NywwLjQyOS0wLjA4NiwxLjQzNi0wLjMzOCwyLjM4NGMtMC45MSwzLjQ0NC02LjEzNCwzLjg3NS03LjMzNSwwLjQgICBjLTAuMzU3LTEuMDMxLTAuNDEtMi4yMDUtMC40MTItMy4zMTVjLTAuMDEyLTcuMjY2LTEuNTkxLTE0LjUyNi01LjI1Ni0yMC44NDljLTMuNzY3LTYuNDk5LTkuNTIzLTExLjk2LTE2LjI3Mi0xNS4yNjcgICBjLTQuMDgyLTEuOTk4LTguNDk1LTMuMjQxLTEyLjk2OS0zLjk4Yy0xLjk1NS0wLjMyNC0zLjkzMS0wLjUxOS01Ljg5Ni0wLjc5M2MtMi4zODEtMC4zMzEtMy42NTMtMS44NDgtMy41MzktNC4xOTQgICBjMC4xMDUtMi4xOTgsMS43MTItMy43ODEsNC4xMDgtMy42NDRjNy44NzMsMC40NDYsMTUuNDc5LDIuMTUsMjIuNDgsNS44NTZjMTQuMjM0LDcuNTM5LDIyLjM2NiwxOS40MzcsMjQuNzQsMzUuMzI2ICAgYzAuMTA3LDAuNzIxLDAuMjc5LDEuNDMzLDAuMzM0LDIuMTU1QzMwNy45OTEsMjI4Ljg4LDMwOC4wNzYsMjMwLjY2NSwzMDguMjEyLDIzMy4wMTkgICBDMzA4LjE1NSwyMzMuNDQ2LDMwOC4wNzYsMjMwLjY2NSwzMDguMjEyLDIzMy4wMTl6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTI4Ni44NzIsMjMyLjE4OGMtMi44NywwLjA1Mi00LjQwNi0xLjUzOC00LjcwMy00LjE2OGMtMC4yMDUtMS44MzQtMC4zNjktMy42OTQtMC44MDctNS40OCAgIGMtMC44NjItMy41MTctMi43MzEtNi43NzUtNS42ODktOC45M2MtMS4zOTYtMS4wMTctMi45NzktMS43NTgtNC42MzYtMi4yMzhjLTIuMTA1LTAuNjA5LTQuMjkzLTAuNDQxLTYuMzkyLTAuOTU1ICAgYy0yLjI4MS0wLjU1OS0zLjU0My0yLjQwNy0zLjE4NC00LjU0NmMwLjMyNi0xLjk0OCwyLjIyLTMuNDY4LDQuMzQ5LTMuMzEzYzEzLjMwMiwwLjk2LDIyLjgwOSw3LjgzNywyNC4xNjYsMjMuNDk3ICAgYzAuMDk3LDEuMTA1LDAuMjA5LDIuMjcyLTAuMDM2LDMuMzMxQzI4OS41MTgsMjMxLjE5MywyODguMTc4LDIzMi4xLDI4Ni44NzIsMjMyLjE4OCAgIEMyODQuMDAxLDIzMi4yMzksMjg4LjE3OCwyMzIuMSwyODYuODcyLDIzMi4xODh6Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0QxRDFEMTsiIGQ9Ik0zOTEuNDI3LDE3OS45MjRsLTAuMDg0LTAuMzM4Yy0zLjgzNC0xNS41MDEtMTUuMjEyLTMxLjYzNS0yOS40NTgtNDMuOTExbC0xOS4yNTksMTcuMDY4ICBjMTEuNDUyLDkuMTI1LDIxLjI2NCwyMS43NjYsMjQuMDUyLDMyLjc4YzcuNjIsMzQuOTA3LDcuNjIsNzAuMjkyLDAsMTA1LjJjLTQuNTY3LDE4LjA0MS0yNy45ODIsNDAuNDY5LTQ2LjU4NSw0NC42MTMgIGMtMjQuMzU1LDQuNjMyLTQ4LjkwNCw2LjYxMS03My40MjgsNS45MzJjLTAuNDg4LTAuMDE0LTAuOTU3LDAuMTc2LTEuMjk2LDAuNTI2Yy0zLjQ4MSwzLjU3Mi0yMi44MzUsMjMuNDQyLTIyLjgzNSwyMy40NDIgIGwtMjQuMjg4LDI0LjkyOGMtMS43NzYsMS44NTItNC44OTYsMC41OTMtNC44OTYtMS45NjR2LTUxLjEzNmMwLTAuODQ1LTAuNjAzLTEuNTYyLTEuNDMzLTEuNzI2Yy0wLjAwNSwwLTAuMDA5LTAuMDAyLTAuMDE0LTAuMDAyICBjLTEwLjU3My0yLjM1NS0yMi42OTItMTAuNjE4LTMyLjAyOC0yMC42MjFsLTE5LjAzLDE2Ljg2M2MxMS44ODUsMTIuOTI5LDI3LjIxNCwyMy4zODEsNDIuMTY4LDI3LjY1MXYzMC44NjggIGMwLDExLjE3MywxMy42MTUsMTYuNjYsMjEuMzU3LDguNTk3bDMxLjI3NS0zMi41MDljNi43ODQsMC4zNzksMTMuNTY5LDAuNTkxLDIwLjM1NiwwLjU5MWMyMy4wNTcsMCw0Ni4xMjUtMi4xODEsNjkuMDIzLTYuNTQ5ICBsMC4zMTktMC4wNjVjMjguMzItNi4xNzMsNTkuMTU4LTM1Ljg0NSw2NS45OTgtNjMuNDk4bDAuMDg0LTAuMzM4QzM5OS44ODIsMjU3LjcwNSwzOTkuODgyLDIxOC41NDMsMzkxLjQyNywxNzkuOTI0eiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTI5Ni40NywzMTQuMzI3QzI5OC45NTYsMzEzLjU2MSwyOTMuNjEsMzEzLjQ1OCwyOTYuNDcsMzE0LjMyN0wyOTYuNDcsMzE0LjMyN3oiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0QxRDFEMTsiIGQ9Ik0zMTcuOTIxLDI4MS42NjRjLTMuNzUzLTMuMzA1LTcuODA2LTYuMTQyLTExLjg3NC05LjA0MmMtNC4xNDYtMi45NTUtOC4zMTYtNS44NzctMTIuNjE5LTguNjAxICBjLTQuMzAxLTIuNzIyLTkuNDA0LTIuNjc5LTEzLjM5OCwwLjU4NmMtNC4wODYsMy4zNDEtNS45NzMsOS43MzctMTEuODA0LDEwLjQxOGMtMy40ODEsMC40MDUtNi41MTYtMS4wNTktOS41MzgtMi4zMTUgIGMtMTEuNjE5LTQuODM0LTIwLjQzNS0xMi4yMjYtMjcuMDk4LTIxLjU1OWwtMTQuMTYsMTIuNTVjMC40ODEsMC41NTcsMC45NCwxLjEyOSwxLjQyOSwxLjY3OSAgYzE5LjEyMiwyMS41MjEsNDMuMjYzLDM1LjU2MSw2OS40OTIsNDYuNDQ0YzIuNTMxLDEuMDUsNS4yNTgsMS42MzQsOC4xMTgsMi41MDFjLTIuODYtMC44NjksMi40ODgtMC43NjUsMCwwICBjMi40ODgtMC43NjUsNS4xMi0xLjE1LDcuMzI3LTIuMzMyYzcuODExLTQuMTk2LDEzLjIyNC0xMC43NjgsMTYuOTQ0LTE4LjY2OEMzMjIuNzc0LDI4OS4wMTMsMzIxLjUzMSwyODQuODQzLDMxNy45MjEsMjgxLjY2NHoiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTI1Ni4xNTksMTY1LjQzMWMtMC4wMjksMC0wLjA1Ny0wLjAwMy0wLjA4Ni0wLjAwMyAgIEMyNTYuMDQ1LDE2NS40MjYsMjU2LjA4MSwxNjUuNDI4LDI1Ni4xNTksMTY1LjQzMXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMjU2LjA3MiwxNjUuNDI2YzAuMDI5LDAsMC4wNTcsMC4wMDMsMC4wODYsMC4wMDNDMjU4LjA2MiwxNjUuNDk3LDI4OS4wMywxNjYuMzUsMjU2LjA3MiwxNjUuNDI2eiIvPgo8L2c+CjxnPgoJPHBhdGggc3R5bGU9ImZpbGw6I0QxRDFEMTsiIGQ9Ik0zMDUuMjg1LDE4NS44MzdsLTYuMDM3LDUuMzUxYzkuNDg3LDkuMjMsMTYuMDI5LDIxLjQ2MywxNy44OTksMzQuOTI1ICAgYzAuNjcyLDQuODQyLDAuOTE5LDkuNzQ1LDEuMjcyLDE0LjYyN2MwLjE3OSwyLjQ2NywxLjQxNSw0Ljc2OCw0LjE2Nyw0LjczNmMyLjY2My0wLjAzMyw0LjA2LTIuMzc2LDMuODY3LTQuODQ0ICAgYy0wLjQ1OS01Ljg2Ni0wLjgyNC0xMS43NzYtMS44NTMtMTcuNTU1QzMyMS45NTcsMjA4LjIyOSwzMTUuMDcsMTk1LjUxOCwzMDUuMjg1LDE4NS44Mzd6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDFEMUQxOyIgZD0iTTMwNy41MjEsMjI0LjkzOWMtMS43MjktMTEuNTc4LTYuNTMyLTIxLjAyNi0xNC41MS0yOC4yMjRsLTYuMDIsNS4zMzUgICBjMy4xMTMsMi43NjMsNS44MDYsNi4wMDgsNy44OCw5LjU4N2MzLjY2NSw2LjMyMyw1LjI0NCwxMy41ODMsNS4yNTYsMjAuODQ5YzAuMDAyLDEuMTEsMC4wNTUsMi4yODQsMC40MTIsMy4zMTcgICBjMS4yMDMsMy40NzcsNi40MjUsMy4wNDYsNy4zMzUtMC40YzAuMjUyLTAuOTUsMC4yODEtMS45NTcsMC4zMzgtMi4zODRjLTAuMDU3LDAuNDI5LTAuMTM4LTIuMzUzLDAsMCAgIGMtMC4xMzgtMi4zNTMtMC4yMjItNC4xMzktMC4zNTctNS45MjNDMzA3LjgwMiwyMjYuMzcxLDMwNy42MjksMjI1LjY1OSwzMDcuNTIxLDIyNC45Mzl6Ii8+CjwvZz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTMwOC4yMTIsMjMzLjAxOUMzMDguMDc2LDIzMC42NjUsMzA4LjE1NSwyMzMuNDQ2LDMwOC4yMTIsMjMzLjAxOUwzMDguMjEyLDIzMy4wMTl6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTI4Ni44NzIsMjMyLjE4OGMwLjA0NS0wLjAwMywwLjA4OC0wLjAyNiwwLjEzMS0wLjAzMWMtMC4xMjEsMC0wLjMwNywwLjAwMy0wLjQ5OCwwLjAxICAgQzI4Ni42MjksMjMyLjE3LDI4Ni43NDIsMjMyLjE4OSwyODYuODcyLDIzMi4xODh6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTI4Ni44NzIsMjMyLjE4OGMtMC4xMjksMC4wMDItMC4yNDMtMC4wMTctMC4zNjctMC4wMjEgICBDMjg1Ljg4NCwyMzIuMTg0LDI4NS4yNDMsMjMyLjIxNywyODYuODcyLDIzMi4xODh6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTI4Ny4wMDMsMjMyLjE1N2MtMC4wNDUsMC4wMDUtMC4wODgsMC4wMjgtMC4xMzEsMC4wMzEgICBDMjg3LjIwOCwyMzIuMTY1LDI4Ny4xNzksMjMyLjE1NywyODcuMDAzLDIzMi4xNTd6Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0QxRDFEMTsiIGQ9Ik0yODAuODE0LDIwNy41MjVsLTYuMTI4LDUuNDMyYzAuMzM4LDAuMjA1LDAuNjY5LDAuNDE5LDAuOTksMC42NTIgIGMyLjk1OCwyLjE1NSw0LjgyNyw1LjQxMyw1LjY4OSw4LjkzYzAuNDM4LDEuNzg2LDAuNiwzLjY0NCwwLjgwNyw1LjQ4YzAuMjgzLDIuNTEzLDEuNzEsNC4wNTgsNC4zMzYsNC4xNDggIGMwLjE5MS0wLjAwNSwwLjM3OS0wLjAwOSwwLjQ5OC0wLjAxYzEuMjY0LTAuMTQsMi41MzEtMS4wMjYsMi45MzYtMi43NzRjMC4yNDUtMS4wNTcsMC4xMzMtMi4yMjYsMC4wMzYtMy4zMzEgIEMyODkuMjE2LDIxNy4yOTcsMjg1LjkwNiwyMTEuMjksMjgwLjgxNCwyMDcuNTI1eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                <a href="mailto:modalmall@bk.ru">
                    <img style="width: 45px"
                         src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8cGF0aCBzdHlsZT0iZmlsbDojMTdBQ0U4OyIgZD0iTTI1NywwQzExNi4zMDIsMCwwLDExNC4zLDAsMjU1czExNi4zMDIsMjU3LDI1NywyNTdzMjU1LTExNi4zLDI1NS0yNTdTMzk3LjY5OCwwLDI1NywweiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojMTY4OUZDOyIgZD0iTTUxMiwyNTVjMCwxNDAuNy0xMTQuMzAyLDI1Ny0yNTUsMjU3VjBDMzk3LjY5OCwwLDUxMiwxMTQuMyw1MTIsMjU1eiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojQ0FFOEY5OyIgZD0iTTI1Nyw5MGMtOTAuOTAxLDAtMTY3LDc0LjA5OS0xNjcsMTY1YzAsOTAuODk5LDc2LjA5OSwxNjcsMTY3LDE2N2MzNi41OTksMCw3MS40LTExLjcsMTAwLjIwMy0zMy45ICBjMTUuODk3LTEyLjMwMS0yLjcwMy0zNi0xOC4wMDMtMjRDMzE1LjQ5OSwzODIuNCwyODcsMzkyLDI1NywzOTJjLTc0LjM5OSwwLTEzNy02Mi42MDEtMTM3LTEzN2MwLTc0LjQwMSw2Mi42MDEtMTM1LDEzNy0xMzUgIHMxMzUsNjAuNTk5LDEzNSwxMzV2MTdjMCwzOS42LTYwLDM5LjYtNjAsMHYtNzdjMC0xOS44MDEtMzAtMTkuODAxLTMwLDB2MC4zYy0xMi41OTgtOS4zLTI3Ljg5OC0xNS4zLTQ1LTE1LjMgIGMtNDEuNCwwLTc1LDMzLjYtNzUsNzVzMzMuNiw3Nyw3NSw3N2MyMi41LDAsNDIuMjk3LTkuOTAxLDU2LjEtMjUuNTAxQzM0Ni43LDM1NC41LDQyMiwzMzAuMiw0MjIsMjcydi0xNyAgQzQyMiwxNjQuMDk5LDM0Ny45MDEsOTAsMjU3LDkweiBNMjU3LDMwMmMtMjQuOTAyLDAtNDUtMjIuMTAxLTQ1LTQ3YzAtMjQuOTAxLDIwLjA5OC00NSw0NS00NXM0NSwyMC4wOTksNDUsNDUgIEMzMDIsMjc5Ljg5OSwyODEuOTAyLDMwMiwyNTcsMzAyeiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNCN0UwRjY7IiBkPSJNMzU3LjIwMywzODguMUMzMjguNCw0MTAuMywyOTMuNTk5LDQyMiwyNTcsNDIydi0zMGMzMCwwLDU4LjQ5OS05LjYsODIuMi0yNy45ICAgQzM1NC41LDM1Mi4wOTksMzczLjEsMzc1Ljc5OSwzNTcuMjAzLDM4OC4xeiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0I3RTBGNjsiIGQ9Ik00MjIsMjU1djE3YzAsNTguMi03NS4zLDgyLjUtMTA4LjksMzQuNDk5QzI5OS4yOTcsMzIyLjA5OSwyNzkuNSwzMzIsMjU3LDMzMnYtMzAgICBjMjQuOTAyLDAsNDUtMjIuMTAxLDQ1LTQ3YzAtMjQuOTAxLTIwLjA5OC00NS00NS00NXYtMzBjMTcuMTAyLDAsMzIuNDAyLDYsNDUsMTUuM1YxOTVjMC0xOS44MDEsMzAtMTkuODAxLDMwLDB2NzcgICBjMCwzOS42LDYwLDM5LjYsNjAsMHYtMTdjMC03NC40MDEtNjAuNjAxLTEzNS0xMzUtMTM1VjkwQzM0Ny45MDEsOTAsNDIyLDE2NC4wOTksNDIyLDI1NXoiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                </a>
            </div>
            <div class="col-md-9">
                <div class="text-center">
                    <ul class="footer-nav list-unstyled row">
                        @php $menu = App\Menu::with('images')->where('type', 3)->where('status', 1)->get(); @endphp
                        @foreach($menu as $item)
                            <li class="footer-nav__item col">
                                <a class="footer-nav__link" href="{{$item['link']}}">
                                    @if(isset($item->images[0]))
                                        <img class="footer-nav__icon" alt="{{$item['title']}}" style="width: 40px"
                                             src="/storage{{$item->images[0]['path']}}/{{$item->images[0]['name']}}.{{$item->images[0]['ext']}}">
                                    @endif
                                    {{--<img class="footer-nav__icon" style="width: 60px" src="{{$item['']}}"--}}
                                    {{--alt="Мобильная версия">--}}
                                    <span class="footer-nav__name">{{$item['title']}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer-copyright text-center">
                    ModalMall - интернет магазин качественных трикотажных, насочно-чулочных изделий и белья. Все права
                    зашищены. Доставка по всей России.
                    © ModalMall 2017 - {{date('Y')}}
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js').then(function (reg) {
            console.log('Registration succeeded. Scope is ' + reg.scope);
        }).catch(function (error) {
            console.log('Registration failed with ' + error);
        });
    }
</script>
@yield('script')
<script>
    $(document).ready(function () {
        var header = $('nav');
        $(window).on('scroll load resize', function () {
            var scrolled = $(window).scrollTop();
            if (scrolled > 200) {
                header.addClass('fixed');
                setTimeout(function () {
                    header.addClass('show')
                }, 50);
            }
            if (scrolled < 200) {
                header.removeClass('fixed show');
            }
        });
        function cart_update(_this, qt, md) {
            $.ajax({
                method: 'post',
                url: _this.siblings('.product__qt').attr('data-action'),
                data: {_method: 'PUT', qt: qt},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            }).done(function (data) {
                if (data.success) {
                    var cost = _this.parents('tr').find('.product__cost').val();
                    _this.parents('tr').find('.product__qt-text').text(qt);
                    var total = 0;
                    var products_qt = 0;
                    var products__total = $('#product__total');
                    if (md == '+') {
                        total = parseInt(products__total.find('input').val()) + parseInt(cost);
                        products_qt = parseInt($('#product__cart-qt').text()) + 1;
                    } else {
                        total = parseInt(products__total.find('input').val()) - parseInt(cost);
                        products_qt = parseInt($('#product__cart-qt').text()) - 1;
                    }
                    products__total.find('input').val(total);
                    products__total.find('span').text(total);
                    $('#product__cart-qt').text(products_qt);
                }
            });
            return false;
        }

        $('.product__qt-minus').click(function () {
            var qt = $(this).siblings('.product__qt');
            if (parseInt(qt.val()) > 1) {
                var item_qt = parseInt(qt.val()) - 1;
                qt.val(item_qt);
                cart_update($(this), item_qt, '-');
            }
        });
        $('.product__qt-plus').click(function () {
            var qt = $(this).siblings('.product__qt');
            var item_qt = parseInt(qt.val()) + 1;
            qt.val(item_qt);
            cart_update($(this), item_qt, '+');
        });
        $('.product__cart-form input[type=radio], #size').change(function () {
            $('.product__cart-form button[type=submit]').attr('data-link', 0).text('В корзину');
        });
        $('.product__cart-form').submit(function () {
            var _this = $(this);
            if (_this.find('button[type=submit]').attr('data-link') == 1) {
                window.location = '/cart';
                return false;
            }
            $.ajax({
                method: 'post',
                url: _this.attr('action'),
                data: $(this).serializeArray(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (data) {
                if (data.success) {
                    _this.find('button[type=submit]').attr('data-link', 1)
                            .text('Перейти в корзину');
                    $('#cart-product__qt').text(data.qt);
                }
            });
            return false;
        });
    });
</script>
{{--<script src="//code.jivosite.com/widget.js" jv-id="HppuFpTeFt" async></script>--}}
</body>
</html>