<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="{{asset('boots/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
<title>Laravel 5 </title>
</head>
<body style="padding-top:30px;">
@include('komponen.navbar');
<section>
<div class="container clearfix">
    <div class="row row-offcanvas row-offcanvas-left ">
             @include("komponen.left_nav")          
<div id="main-content" class="col-xs-12 col-sm-9 main pullright">
    <div class="panel-body">
    @if (Session::has('error'))
        <div class="session-flash alert-danger">
        {{Session::get('error')}}
        </div>
    @endif
    @if (Session::has('notice'))
        <div class="session-flash alert-info">
        {{Session::get('notice')}}
        </div>
    @endif
     @yield('content')
    </div>
</div>

    </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('boots/js/bootstrap.min.js')}}"></script>
</body>
<!-- <script src="{{asset('js/Mypic.js')}}"></script> -->

</html>