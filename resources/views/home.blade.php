@extends('template.template')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>   
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="pic/Kebun.jpg" alt="First Slide">
                    <div class="carousel-caption">
                        <h3>Ini Kebun</h3>
                    </div>
                </div>
                <div class="item">
                    <img src="pic/sungai.jpg" alt="Second Slide">
                    <div class="carousel-caption">
                        <h3>Ini Sungai</h3>
                    </div>
                </div>
                <div class="item">
                    <img src="pic/hutan.jpg" alt="Third Slide">
                    <div class="carousel-caption">
                        <h3>Ini Hutan</h3>
                    </div>
                </div>
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div> 
    </div>    
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-1">
        <h1>Hallo, Nama saya Ruben, saya lulusan Unikom dan sedang melakukan traning</h1>
    </div>
    <div class="col-md-4 col-md-offset-3">
        <address>
            Facebook <a href="#">Rubenson</a>.<br>
            Twiterr <a href="#">Rubenson</a>.<br>  
            Telepon : 082214154048 <br>
            Alamat<br>
            Jl. Raya timur No.507 Rt.01 Rw.15<br>
        </address>
    </div>
@stop