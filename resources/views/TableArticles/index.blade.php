@extends("template.tableview")

@section("content")

<div class="row">
    <button class="add-modal btn btn-success" >Add a Article </button>
</div>
<br/>
<div class="row">
    <table class="table table-striped table-bordered table-hover" id="postTable" style="">
                        <thead>
                            <tr>
                                <th valign="middle">ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Last updated</th>
                                <th>Actions</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
@include('Tablearticles.list')
@include('Tablearticles.modals')
@stop