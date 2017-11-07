<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta name="author" content="{{sg_config('SITE_AUTHOR', 'SgWiki')}}" />
    <meta charset="utf-8"><link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('desc')" />
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{{asset('static/layui/css/layui.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('static/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('static/js/respond.min.js')}}"></script>
    <![endif]-->
    @yield('style')
</head>
<body>
@include("widget.header")
@section('body')
{{--内容区--}}
@endsection
<script src="{{asset('static/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('static/layui/layui.js')}}"></script>
<script src="{{asset('static/layer/layer.js')}}"></script>
@yield('script)
@include("widget.footer")
</body>
</html>