<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="{{('boots/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{('css/bootstrap.css')}}" rel="stylesheet">
<title>Laravel 5 </title>
</head>
    @include('komponen.navbar');
<body>
    <section>
        <div class="row">
        @yield('content')
        </div>
    </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="boots/js/bootstrap.min.js"></script>
</body>
<script src="js/Mypic.js"></script>

</html>