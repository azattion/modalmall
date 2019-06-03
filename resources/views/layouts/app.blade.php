<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ModalMall - @yield('title')</title>
    {{--<script src="/store/public/js/manifest.js"></script>--}}
    {{--<script src="/store/public/js/vendor.js"></script>--}}
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    {{--@section('sidebar')--}}
        {{--This is the master sidebar.--}}
    {{--@show--}}
    <div class="container">
        @yield('content')
    </div>
</body>
</html>