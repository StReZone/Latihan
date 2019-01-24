@extends("template.template")

@section("content")
<article class="row">
    <h2>{!! $article->title !!}</h2>
    <div>{!! $article->content !!}</div>
    <i>By {!! $article->author !!}</i>
</article>
<div class="row">
    @foreach($img as $image) 
    <div class="col-md-3">
        <img src="{!! asset($image->file) !!}" class="img-responsive">
    </div>
    @endforeach
</div>
   
<div class="row">
    <div class="col-md-6">
    <h3><i><u>Give Comments</u></i></h3>
        {!! Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group">
        {!! Form::label('article_id', 'Title', array('class' => 'col-lg-3 control-label')) !!}
            <div class="col-lg-9">
                {!! Form::text('article_id', $article->id, array('class' => 'form-control', 'readonly')) !!}
            </div>
        </div>
        <div class="form-group">
        {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
            <div class="col-lg-9">
                {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10, 'autofocus' => 'true')) !!}
                {!! $errors->first('content') !!}
            </div>
        </div>
        <div class="form-group">
        {!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!}
            <div class="col-lg-9">
                {!! Form::text('user', null, array('class' => 'form-control')) !!}
            </div>
        </div>
    <div class="form-group">
        <div class="col-lg-3"></div>
            <div class="col-lg-9">
            {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}
    </div>
    </div>
    <div class="col-md-6">
        @foreach($article->comments()->get() as $k => $comment) 
        
            @if ( $k % 2 == 0)
                <div class="bs-callout bs-callout-danger">
                    <div class="row"> 
                        <p class="text-left">-{!! $comment->user !!}</p>
                    </div>
                </div> 
                @else
                <div class="bs-callout bs-callout-info">
                    <div class="row"> 
                        <p class="text-right">{!! $comment->user !!}-</p>
                    </div>
                </div> 
            @endif 
                
           
            @if ( $k % 2 == 0)
                <div class="bs-callout bs-callout-danger">
                    <div class="row"> 
                        <p class="text-left">{!! $comment->content !!}</p>
                    </div>
                </div>
                @else
                <div class="bs-callout bs-callout-info">
                    <div class="row"> 
                        <p class="text-right">{!! $comment->content !!}</p>
                    </div>
                </div>
            @endif  
              

        @endforeach
    </div>
    
</div>
@stop 
        


