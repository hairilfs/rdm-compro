<!DOCTYPE html>




<html lang="{{ app()->getLocale() }}" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RDM - @yield('title', '')</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000">

    @hasSection('meta')
    
    @yield('meta')
    
    @else
    <meta name="description" content="RDM">
    <meta property="og:url" content="{{ url('/').'/' }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="RDM - Home">
    <meta property="og:description" content="Creativity Meets Reality">
    <meta property="og:image" content="http://web.onerdm.com/uploads/slider/home/desk1524737764.jpg">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ url('/').'/' }}">
    <meta name="twitter:creator" content="RDM">
    <meta name="twitter:title" content="RDM - Home">
    <meta name="twitter:description" content="Creativity Meets Reality">
    <meta name="twitter:image" content="http://web.onerdm.com/uploads/slider/home/desk1524737764.jpg">
    @endif
    <base href="{{ url('/').'/' }}">

    <link rel="canonical" href="" />

    <link rel="icon" type="image/png" href="assets/icon/icon.png">

    <link rel="icon" type="image/png" href="assets/icon/icon-16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/icon/icon-32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/icon/icon-96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="assets/icon/icon-192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="assets/icon/icon-194.png" sizes="194x194">
    
    <link rel="apple-touch-icon" href="assets/icon/icon-57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="assets/icon/icon-60.png" sizes="60x60">
    <link rel="apple-touch-icon" href="assets/icon/icon-72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="assets/icon/icon-76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="assets/icon/icon-114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="assets/icon/icon-120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="assets/icon/icon-144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="assets/icon/icon-152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="assets/icon/icon-180.png" sizes="180x180">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
    
    @if ( App::environment(['local', 'staging']) )
        <script src="../../_html/app/assets/script.js?{{ filemtime('../../_html/app/assets/script.js') }}"></script>
        <link rel="stylesheet" href="../../_html/app/assets/style.css?{{ filemtime('../../_html/app/assets/style.css') }}">
    @else
        <script src="{{ asset('assets/script.js?'.date('YmdH')) }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/style.css?'.date('YmdH')) }}">
    @endif

    @isset ($landing)
        <link rel="stylesheet" href="{{ asset('assets/landing.css?'.date('YmdH')) }}">
        <script src="{{ asset('assets/landing.js?'.date('YmdH')) }}"></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-59002254-1', 'auto');
          ga('send', 'pageview');

        </script>
    @endisset

    @yield('head')

    <script type="text/javascript">
        window.App = {!! json_encode([
                'baseUrl' => url('/').'/',
                'csrfToken' => csrf_token()
            ]) !!};
    </script>

</head>


<body class="@yield('body_class', '')">

@include('partials.header')

@yield('content', '')

@stack('scripts')

</body>
</html>
