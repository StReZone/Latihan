<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="{{('boots/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<title>Traning HTML,CSS dan JS </title>
</head>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                    <a class="navbar-brand" href="home.htm">Training HTLM, CSS dan JS </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="{{'/Home'}}">Home</a></li>
                <li ><a href="{{'/Profile'}}"> Profile</a></li>
                <li ><a href="{{'/Contact'}}"> Contact</a></li>
            </ul>
        </div>  
    </nav>
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