@extends("template.template")
@section("content")
    <h3>Create a Article</h3>
    {!! Form::open(['route' => 'articles.store', 'class' => 'formhorizontal', 'role' => 'form']) !!}
        @include('articles.form')
    {!! Form::close() !!}
@stop