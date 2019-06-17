<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ModalMall - @yield('title')</title>
    {{--<script src="/store/public/js/manifest.js"></script>--}}
    {{--<script src="/store/public/js/vendor.js"></script>--}}
    {{--TODO - Добавить актупльные данные--}}
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
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico"/>
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
        @font-face {
            font-family: 'AG_Futura';
            font-style: normal;
            font-weight: 400;
            src: local('AG_Futura'), local('AG_Futura-Regular'),
            /*url(/font/AG_Futura.woff) format('woff'),*/
            url(/font/AG_Futura.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Aquarelle';
            font-style: normal;
            font-weight: 400;
            src: local('AG_Futura'), local('Aquarelle'),
            /*url(/font/Aquarelle.woff) format('woff'),*/
            url(/font/Aquarelle.ttf) format('truetype');
        }
        @font-face {
            font-family: 'AG_Futura Bold';
            font-style: normal;
            font-weight: 700;
            src: local('AG_Futura Bold'), local('AG_Futura-Bold'),
            /*url(/font/AG_Futura_Bold.woff) format('woff'),*/
            url(/font/AG_Futura_Bold.ttf) format('truetype');
        }
        .header-title__italic{
            font-family: 'Aquarelle', arial;
            color: #ee6688;
            font-size: 50px;
        }
        body{
            background-image: url(/img/content-bg-left.png), url(/img/content-bg-right.png);
            background-repeat: no-repeat, no-repeat;
            background-position: left center, right center;
            background-size: contain;
        }
        header{
            background-image: url(/img/header-bg-top-center.png), url(/img/header-bg-bottom-center.png);
            background-repeat: no-repeat, no-repeat;
            background-position: top center, bottom center;
            background-size: contain;
        }
        nav{
            background-color: #ee6688;
            padding: 5px 0;
        }
        nav a{
            font-family: 'AG_Futura Bold', arial;
            font-weight: bold;
            color: #fff;
        }
        .category__name{
            background-color: #ee6688;
            color: #fff;
            font-weight: bold;
        }
        .product{
            position: relative;
        }
        .product:nth-child(even):before{
            content: ' ';
            display: block;
            top: -100px;
            background: url(/img/cart-1.png);
        }
        .product__new{
            position: absolute;
            right: 0;
            bottom: 0;
            margin-bottom: -40px;
            margin-right: -40px;
            width: 80px;
            z-index: 1;
        }
        .product__sale{
            position: absolute;
            right: 0;
            top: 0;
            margin-top: -40px;
            margin-right: -40px;
            width: 80px;
            z-index: 1;
        }
        .product__cover{
            border: 5px solid #f7b5bd;
            border-radius: 5px;
            position: relative;
        }
        .product__cost{
            color: #000;
            font-weight: 700;
            font-family: 'AG_Futura Bold'
        }
        .product__name{
            color: #000;
            font-weight: 700;
            font-family: 'AG_Futura Bold'
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
            <div class="col-md-3">
                <form action="{{route('products.search')}}" method="get">
                    <div class="form-row">
                        <div class="col-md-10">
                            <input name="q" value="{{isset($_GET['q'])?$_GET['q']:''}}" class="form-control" type="text"
                                   placeholder="Введите слово..">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-link">
                                <img style="width: 30px" src="/img/search.png">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-center">
                <ul class="list-unstyled row" style="margin-bottom: 0">
                    <li class="col-sm"><a href="{{route('user.cabinet')}}"><img style="width: 60px;"
                                                                                          src="/img/cabinet.png"
                                                                                          alt="Личный кабинет"></a><br/>Личный
                        кабинет
                    </li>
                    <li class="col-sm"><a href="{{route('user.cart.index')}}"><img style="width: 60px;"
                                                                                             src="/img/cart.png"
                                                                                             alt="Корзина"></a><br/>Корзина
                    </li>
                    <li class="col-sm"><a href="/delivery"><img style="width: 60px;" src="/img/delivery.png"
                                                                          alt="Доставка"></a><br/>Доставка
                    </li>
                    <li class="col-sm"><a href="/promotion"><img style="width: 60px;" src="/img/promotion.png"
                                                                           alt="Акция"></a><br/>Акция
                    </li>
                    <li class="col-sm"><a href="/gift"><img style="width: 60px;" src="/img/gift.png"
                                                                      alt="Подарок"></a><br/>Подарок
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="list-unstyled row" style="margin-bottom: 0">
                    <li class="col-sm"><a class="text-uppercase" href="">О нас</a></li>
                    <li class="col-sm"><a class="text-uppercase" href="">Десткое</a></li>
                    <li class="col-sm"><a class="text-uppercase" href="">Женское</a></li>
                    <li class="col-sm"><a class="text-uppercase" href="">Мужское</a></li>
                    <li class="col-sm"><a class="text-uppercase" href="">Plus size</a></li>
                    <li class="col-sm"><a class="text-uppercase" href="">Family look</a></li>
                    <li class="col-sm"><a class="text-uppercase" href="">Новинки</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<section>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="pad margin no-print">
                <div class="alert alert-success" style="margin-bottom: 0!important;">
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
            <div class="col-md-9 text-center">
                <ul class="list-unstyled row" style="margin-bottom: 0">
                    <li class="col-sm">
                        <a href="">
                            <img style="width: 60px" src="/img/mobile-version.png" alt="Мобильная версия">
                            <br/>Мобильная версия
                        </a>
                    </li>
                    <li class="col-sm">
                        <a href="">
                            <img style="width: 60px" src="/img/brands.png" alt="Бренды">
                            <br/>Бренды
                        </a>
                    </li>
                    <li class="col-sm">
                        <a href="">
                            <img style="width: 60px" src="/img/service.png" alt="Сервис">
                            <br/>Сервис
                        </a>
                    </li>
                    <li class="col-sm">
                        <a href="">
                            <img style="width: 60px" src="/img/partners.png" alt="Партнеры">
                            <br/>Партнеры
                        </a>
                    </li>
                    <li class="col-sm">
                        <a href="">
                            <img style="width: 60px" src="/img/reviews.png" alt="Отзывы">
                            <br/>Отзывы
                        </a>
                    </li>
                    <li class="col-sm">
                        <a href="">
                            <img style="width: 60px" src="/img/about.png" alt="О нас">
                            <br/>О нас
                        </a>
                    </li>
                </ul>
                ModalMall - интернет магазин качественных трикотажных, насочно-чулочных изделий и белья. Все права
                зашищены. Доставка по всей России.
                © ModalMall 2017 - {{date('Y')}}
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
</body>
</html>