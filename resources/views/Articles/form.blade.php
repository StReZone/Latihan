<div class="form-group">
    {!! Form::label('title', 'Title', array('class' => 'col-lg-3 controllabel')) !!}
        <div class="col-lg-9">
            {!! Form::text('title', null, array('class' => 'form-control', 'autofocus' => 'true')) !!}
            <div class="text-danger">{!! $errors->first('title') !!}</div>
        </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
    <div class="col-lg-9">
        {!! Form::textarea('content', null, array('class' => 'formcontrol', 'rows' => 10)) !!}
    <div class="text-danger">{!! $errors->first('content') !!}</div>
    </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <div class="col-lg-3"></div>
        <div class="col-lg-9">
            {!! Form::submit('Save', array('class' => 'btn btn-raised btnprimary')) !!}
            {!! link_to(route('articles.index'), "Back", ['class' => 'btn btnraised btn-info']) !!}
     </div>
    <div class="clear"></div>
</div>
