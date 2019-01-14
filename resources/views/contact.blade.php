@extends('template.template')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
<div class="col-md-4 col-md-offset-1">
    <h1 > RUBENSON C SILABAN</h1>
    <img class="img-circle" src="pic/profile.jpg" alt="Avatar"style="width:80px">
</div>
<div class="col-md-2">
    <a>Email</a><br><br>
    <a>message</a>
</div>
<div class="col-md-2">
    <form name="myF" action="{{url('Contact')}}" method="post">
        <div class="form-group"></div>
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <input type="text" id="email"name="email"class="form-control"><br><br>
        <div class="form-group"></div>
        <div class="form-group"></div>
            <input text  id="comment" name="comment" class="form-control"><br><br>
        <div class="form-group"></div>
        <input type="submit" name="submit"class="btn btn-success">
    </form>
</div>   
@stop