<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ModalMall - @yield('title')</title>
    {{--<script src="/store/public/js/manifest.js"></script>--}}
    {{--<script src="/store/public/js/vendor.js"></script>--}}
    <script src="/store/public/js/app.js"></script>
</head>
<body>
    @section('sidebar')
        This is the master sidebar.
    @show
    <div class="container">
        @yield('content')
    </div>
</body>
</html>