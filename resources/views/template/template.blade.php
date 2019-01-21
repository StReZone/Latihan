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
    <div id="main-content" class="col-xs-12 col-sm-12">
    <div class="panel-body">
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
    @if (Session::has('notice'))
        <div class="alert alert-info">
            {{Session::get('notice')}}
        </div>
    @endif
    <div class="row">
        <div class="form-group label-floating">
        <form action="{{ url('articles') }}" method="GET">
            <label class="col-md-2"> Search Article</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="cari" value="" id="cari" placeholder="Type Search Keywords">
            </div>
            <div class="col-md-2 ">
                <button id="search" class="btn btn-info btn-flat" name ="action" value= "find" type="submit"> Search </button>
            </div>
            <div class="col-md-4 col-md-push-2">
                <button id="oldest" class="btn btn-info btn-flat" name ="action" value= "oldest" type="submit"> oldest </button>
                <button id="newest" class="btn btn-info btn-flat" name ="action" value= "newest" type="submit"> newest </button>
            </div>
        </div>
    </form>
    </div>
    <br/>
    <p> Sort article by : <a id="id">ID &nbsp;<i id="ic-direction"></i></a></p>
    <br/>
    <div id="data-content">
        @yield('content')
    </div>
    <div id="direction" type="hidden" value="asc">    
</div>

    </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('boots/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
    var path = "{{ url('search') }}";
    $('#search').typeahead({
         minLength: 2,
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>


</body>


</html>