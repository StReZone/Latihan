@extends('template.template')

@section('content')
<div class="col-md-4 col-md-offset-1">
    <h1 > RUBENSON C SILABAN</h1>
    <img class="img-circle" src="pic/profile.jpg" alt="Avatar"style="width:80px">
</div>
<div class="col-md-2">
    <a>Email</a><br><br>
    <a>message</a>
</div>
<div class="col-md-2">
    <form name="myF" action="contact.htm" onsubmit="return validateForm()" method="post">
        <div class="form-group"></div>
            <input type="text" id="email"name="email"class="form-control"><br><br>
        <div class="form-group"></div>
        <div class="form-group"></div>
            <textarea form="myF" id="area" name="area" rows="4" cols="50"class="form-control"></textarea><br><br>
        <div class="form-group"></div>
        <input type="submit" name="submit"class="btn btn-success">
    </form>
</div>   
@stop