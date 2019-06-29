<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ModalMall - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<script src="/store/public/js/manifest.js"></script>--}}
    {{--<script src="/store/public/js/vendor.js"></script>--}}
    {{--TODO - Добавить актуальные данные--}}
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="keywords" content="your, tags"/>
    <meta name="description" content="150 words"/>
    <meta name="subject" content="your website's subject">
    <meta name="copyright" content="company name">
    <meta name="language" content="ES">
    <meta name="robots" content="index,follow"/>
    <meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm"/>
    <meta name="abstract" content="">
    <meta name="topic" content="">
    <meta name="summary" content="">
    <meta name="Classification" content="Business">
    <meta name="author" content="name, email@hotmail.com">
    <meta name="designer" content="">
    <meta name="copyright" content="">
    <meta name="reply-to" content="email@hotmail.com">
    <meta name="owner" content="">
    <meta name="url" content="http://www.websiteaddrress.com">
    <meta name="identifier-URL" content="http://www.websiteaddress.com">
    <meta name="directory" content="submission">
    <meta name="category" content="">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">

    <meta name="og:title" content="The Rock"/>
    <meta name="og:type" content="movie"/>
    <meta name="og:url" content="http://www.imdb.com/title/tt0117500/"/>
    <meta name="og:image" content="http://ia.media-imdb.com/rock.jpg"/>
    <meta name="og:site_name" content="IMDb"/>
    <meta name="og:description" content="A group of U.S. Marines, under command of..."/>

    <meta name="fb:page_id" content="43929265776"/>

    <link rel="alternate" type="application/rss+xml" title="RSS" href="http://feeds.feedburner.com/martini"/>
    <link rel="shortcut icon" type="image/png" href="/img/about.png"/>
    <link rel="fluid-icon" type="image/png" href="/fluid-icon.png"/>
    <link rel="me" type="text/html" href="http://google.com/profiles/thenextweb"/>
    <link rel='shortlink' href='http://blog.unto.net/?p=353'/>
    <link rel='archives' title='May 2003' href='http://blog.unto.net/2003/05/'/>
    <link rel='index' title='DeWitt Clinton' href='http://blog.unto.net/'/>
    <link rel='start' title='Pattern Recognition 1' href='http://blog.unto.net/photos/pattern_recognition_1_about/'/>
    <link rel='prev' title='OpenSearch and OpenID?  A sure way to get my attention.'
          href='http://blog.unto.net/opensearch/opensearch-and-openid-a-sure-way-to-get-my-attention/'/>
    <link rel='next' title='Not blog' href='http://blog.unto.net/meta/not-blog/'/>
    <link rel="search" href="/search.xml" type="application/opensearchdescription+xml" title="Viatropos"/>

    <link rel="self" type="application/atom+xml" href="http://www.syfyportal.com/atomFeed.php?page=3"/>
    <link rel="first" href="http://www.syfyportal.com/atomFeed.php"/>
    <link rel="next" href="http://www.syfyportal.com/atomFeed.php?page=4"/>
    <link rel="previous" href="http://www.syfyportal.com/atomFeed.php?page=2"/>
    <link rel="last" href="http://www.syfyportal.com/atomFeed.php?page=147"/>

    <link rel='shortlink' href='http://smallbiztrends.com/?p=43625'/>
    <link rel="canonical" href="http://smallbiztrends.com/2010/06/9-things-to-do-before-entering-social-media.html"/>
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://smallbiztrends.com/xmlrpc.php?rsd"/>
    <link rel="pingback" href="http://smallbiztrends.com/xmlrpc.php"/>
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
            font-size: 50px;
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
            padding: 10px 0;
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
        }

        .footer-nav__icon {
            margin-bottom: 5px;
        }

        nav {
            background-color: #ee6688;
            padding: 5px 0;
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
            padding: 44px 47px 47px;
            background: url(/img/cart-1.png) top/100% no-repeat;
        }

        .product__img {
            padding: 53px 61px 51px;
            display: inline-block;
            height: 280px;
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
            margin-bottom: -40px;
            margin-right: -40px;
            width: 80px;
            z-index: 1;
        }

        .product-card__sale {
            position: absolute;
            right: 0;
            top: 0;
            margin-top: -40px;
            margin-right: -40px;
            width: 80px;
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
            font-family: 'AG_Futura Bold'
        }
        .product__cost_sale{
            text-decoration: line-through;
        }

        footer {
            border-top: 8px solid #f7b5bd;
            padding: 10px 0 0;
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
        .info-subtitle{
            color: #999;
        }
        .info-body{
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
            float: left
        }

        .review:not(:checked) > input {
            position: absolute;
            top: -9999px;
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
        .col-review {
            margin-bottom: 30px
        }

        .product__review-img {
            float: left;
            width: 125px;
            margin-right: 10px;
            position: relative
        }

        .product__review-img div {
            height: 25px;
            background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCIgdmlld0JveD0iMCAwIDMwNiAzMDYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMwNiAzMDY7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8ZyBpZD0ic3Rhci1yYXRlIj4KCQk8cG9seWdvbiBwb2ludHM9IjE1MywyMzAuNzc1IDI0Ny4zNSwyOTkuNjI1IDIxMS42NSwxODcuNDI1IDMwNiwxMjEuMTI1IDE5MS4yNSwxMjEuMTI1IDE1Myw2LjM3NSAxMTQuNzUsMTIxLjEyNSAwLDEyMS4xMjUgICAgIDk0LjM1LDE4Ny40MjUgNTguNjUsMjk5LjYyNSAgICIgZmlsbD0iIzU4OTBmZiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=) left bottom;
            background-size: 25px
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

        .col-review-value {
            float: left;
            margin-right: 10px;
            font-size: 25px
        }

        .col-review-act {
            margin-right: 30px;
            user-select: none
        }

        .col-review {
            vertical-align: middle;
            line-height: 28px
        }

        .col-review .col-review-act {
            line-height: 25px;
            background-color: #0095da;
            color: #fff;
            padding: 4px 10px;
            border-radius: 6px;
            position: relative
        }

        .col-review.marked .col-review-act {
            padding: 2px 20px 2px 7px;
            background-color: #3bb3ed
        }

        .col-review.marked .col-review-act:after {
            height: 14px;
            padding: 0 0 0 2px;
            position: absolute;
            content: "★"
        }

        .col-review.marked .col-review-act:before {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(136, 183, 213, 0);
            border-right-color: #3bb3ed;
            border-width: 6px;
            margin-top: -6px
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('home')}}"><img style="width: 250px" src="/img/logo.png" alt=""></a>
            </div>
            <div class="col-md-4">
                <form style="margin-top: 20px" action="{{route('products.search')}}" method="get">
                    <div class="form-row">
                        <div class="col-md-10">
                            <input style="margin: 5px 0; border: 1px solid #411979; border-radius: 15px;" name="q"
                                   value="{{isset($_GET['q'])?$_GET['q']:''}}" class="form-control" type="text"
                                   placeholder="Введите слово..">
                        </div>
                        <div class="col-md-2">
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
                    @foreach($menu as $item)
                        <li class="header-nav__item col-sm">
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
                        <li class="main-nav__item col-sm">
                            <a class="main-nav__link text-uppercase" href="{{$item['link']}}">{{$item['title']}}</a>
                        </li>
                    @endforeach
                    @if(auth()->user()['role']==1)
                        <li class="main-nav__item col-sm">
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
                <img class="img-fluid" src="/img/social-buttons.png" alt="Мы в соц сетях">
            </div>
            <div class="col-md-9">
                <div class="text-center">
                    <ul class="footer-nav list-unstyled row">
                        @php $menu = App\Menu::with('images')->where('type', 3)->where('status', 1)->get(); @endphp
                        @foreach($menu as $item)
                            <li class="footer-nav__item col-sm">
                                <a class="footer-nav__link" href="{{$item['link']}}">
                                    @if(isset($item->images[0]))
                                        <img class="footer-nav__icon" alt="{{$item['title']}}" style="width: 60px"
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
{{--<script src="//code.jivosite.com/widget.js" jv-id="HppuFpTeFt" async></script>--}}
</body>
</html>