@extends("template.template")
@section("content")
    <h3>Create a Article</h3>
    {!! Form::open(['route' => 'articles.store', 'class' => 'formhorizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
        @include('articles.form')
    {!! Form::close() !!}
@stop