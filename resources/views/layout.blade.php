<!DOCTYPE html>
<html>
<head>
    <title>Apple_Seed</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery 及 Bootstrap3 -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- jQuery UI (主要是用到 datepicker) -->
    <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap3 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- jQuery UI css -->
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet">
    {{--@todo 先放在同一個 layout，以後再看要怎麼拆分 --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!--不同的 view 依需求各自引入（只有該 view）需要的 js 和 css，請到需要個別引入 js 和 css 的 view 的 section('head-required') 去做修改-->
    @yield('head-required')
</head>
<body>

@include('menu')

<div class="container-fluid"><!--body的 div container-->
    @yield('content')
</div><!--body的 div container-->
<!--各頁各自載入需要的 js-->
@yield('js')
<!--載入共用 js-->
<script type="text/javascript" src="{{ asset('js/helper.js') }}"></script>
</body>
</html>