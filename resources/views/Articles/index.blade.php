@extends("template.template")

@section("content")

<div class="row">
<br/>
    <h2 class="pull-left">List Articles</h2>
    {!! link_to(route("articles.create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}
</div>
@include('articles.list')
@stop