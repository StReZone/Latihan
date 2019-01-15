@extends("template.template")

@section("content")
    <article class="row">
        <h2>{!! $article->title !!}</h2>
        <div>{!! $article->content !!}</div>
        <i>By {!! $article->author !!}</i>
    </article>
    <div>
        <h3><i><u>Give Comments</u></i></h3>
        {!! Form::open(['route' => 'comments.store', 'class' => 'formhorizontal', 'role' => 'form']) !!}
        <div class="form-group">
            {!! Form::label('article_id', 'Title', array('class' => 'col-lg-3 control-label')) !!}
            <div class="col-lg-9">
                {!! Form::text('article_id', $article->id, array('class' => 'form-control', 'readonly')) !!}
            </div>
        <div class="clear"></div>
    </div>

    <div class="form-group">
    {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
        <div class="col-lg-9">
        {!! Form::textarea('content', null, array('class' => 'formcontrol', 'rows' => 10, 'autofocus' => 'true')) !!}
        {!! $errors->first('content') !!}
    </div>

    <div class="clear"></div>
    </div>

    <div class="form-group">
        {!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!}
        <div class="col-lg-9">
             {!! Form::text('user', null, array('class' => 'form-control')) !!}
        </div>

    <div class="clear"></div>
    </div>

    <div class="form-group">
    <div class="col-lg-3"></div>
    <div class="col-lg-9">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    </div>
    <div class="clear"></div>
    </div>
    {!! Form::close() !!}
</div>

@foreach($comments as $comment)
    <div style="outline: 1px solid #74AD1B;">
        <p>{!! $comment->content !!}</p>
        <i>{!! $comment->user !!}</i>
    </div>
@endforeach
@stop