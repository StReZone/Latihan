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
    @if(Request::path() == 'articles')
    <div class="row">
    <!-- <div class="form-group label-floating"> -->
    <form action="{{ url('articles') }}" method="GET">
        <label class="col-md-2"> Search Article</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="cari" value="" id="cari" placeholder="Type Search Keywords">
            <input id="sorting" type="hidden" value="desc"/>
        </div>
        <div class="col-md-2 ">
            <button id="search" class="btn btn-info btn-flat" name ="action" value= "find" type="button"> Search </button>
        </div>
        <div class="col-md-4 col-md-push-2">
            <button  class="sort btn btn-info btn-flat" name ="action" value="desc" type="button"> newest </button>
            <button  class="sort btn btn-info btn-flat" name ="action" value="asc" type="button"> oldest </button> 
        </div>
    </form>
<!-- </div> -->  
</div>
    @endif
    <br/>
    <div id="data-content">
        @yield('content')
    </div>
    

</section>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('boots/js/bootstrap.min.js')}}"></script>
<!-- script hadle for pagination -->
<script>
    $(document).ready(function(){
        $(document).on('click',' .pagination a', function(e) {
            get_page($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        })
    }) 
    function get_page(page) {
        $.ajax({
            url :'/articles?page=' + page,
            type : 'GET',
            dataType : 'json',
            data : {
                'cari' : $('#cari').val()
                
            },
            success : function(data) {
                $('#data-content').html(data['view']);
            },
            error : function (xhr, status, error) {
                console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);
            },
            complete : function() {
                alreadyloading = false;
            }
        }) ; 
    }
</script>
<!-- Script for handle Ajax Search -->
<script>
    $('#search').on('click',function() {
        $.ajax({
            url : '/articles',
            type: 'GET',
            dataType : 'json',
            data : {
                'cari' : $('#cari').val()
            },
            success : function(data) {
                $('#data-content').html(data['view']);
            },
                error : function(xhr, status) {
                    console.log(xhr.error + " ERROR STATUS : " + status);
                },
                complete :function() {
                    alreadyloading=false; 
                }
        });
    });
</script>
<!-- Script for handle ajax shorting-->
<script>
    $('.sort').on('click',function() {
        var btn = $(this).val();
        //alert(btn);
        $.ajax({
            url : '/articles',
            type: 'GET',
            dataType : 'json',
            data : {
                'sort' : btn
            },
            success : function(data) {
                $('#data-content').html(data['view']);
            },
                error : function(xhr, status) {
                    console.log(xhr.error + " ERROR STATUS : " + status);
                },
                complete :function() {
                    alreadyloading=false; 
                }
        });
    });
    
</script>
</body>
</html>