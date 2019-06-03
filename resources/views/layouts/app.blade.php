<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ModalMall - @yield('title')</title>
    {{--<script src="/store/public/js/manifest.js"></script>--}}
    {{--<script src="/store/public/js/vendor.js"></script>--}}
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="keywords" content="your, tags"/>
    <meta name="description" content="150 words"/>
    <meta name="subject" content="your website's subject">
    <meta name="copyright"content="company name">
    <meta name="language" content="ES">
    <meta name="robots" content="index,follow" />
    <meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm" />
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

    <meta name="fb:page_id" content="43929265776" />

    <link rel="alternate" type="application/rss+xml" title="RSS" href="http://feeds.feedburner.com/martini" />
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico" />
    <link rel="fluid-icon" type="image/png" href="/fluid-icon.png" />
    <link rel="me" type="text/html" href="http://google.com/profiles/thenextweb"/>
    <link rel='shortlink' href='http://blog.unto.net/?p=353' />
    <link rel='archives' title='May 2003' href='http://blog.unto.net/2003/05/' />
    <link rel='index' title='DeWitt Clinton' href='http://blog.unto.net/' />
    <link rel='start' title='Pattern Recognition 1' href='http://blog.unto.net/photos/pattern_recognition_1_about/' />
    <link rel='prev' title='OpenSearch and OpenID?  A sure way to get my attention.' href='http://blog.unto.net/opensearch/opensearch-and-openid-a-sure-way-to-get-my-attention/' />
    <link rel='next' title='Not blog' href='http://blog.unto.net/meta/not-blog/' />
    <link rel="search" href="/search.xml" type="application/opensearchdescription+xml" title="Viatropos" />

    <link rel="self" type="application/atom+xml" href="http://www.syfyportal.com/atomFeed.php?page=3"/>
    <link rel="first" href="http://www.syfyportal.com/atomFeed.php"/>
    <link rel="next" href="http://www.syfyportal.com/atomFeed.php?page=4"/>
    <link rel="previous" href="http://www.syfyportal.com/atomFeed.php?page=2"/>
    <link rel="last" href="http://www.syfyportal.com/atomFeed.php?page=147"/>

    <link rel='shortlink' href='http://smallbiztrends.com/?p=43625' />
    <link rel="canonical" href="http://smallbiztrends.com/2010/06/9-things-to-do-before-entering-social-media.html" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://smallbiztrends.com/xmlrpc.php?rsd" />
    <link rel="pingback" href="http://smallbiztrends.com/xmlrpc.php" />
    <link media="only screen and (max-device-width: 480px)" href="http://wordpress.org/style/iphone.css" type="text/css" rel="stylesheet" />
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