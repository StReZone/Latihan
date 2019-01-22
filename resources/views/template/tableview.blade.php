<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="{{asset('boots/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
<title>Laravel 5 </title>
</head>
<body style="padding-top:30px;">
@include('komponen.navbar');
<section>
<div class="container clearfix">   
    <div id="main-content" class="col-xs-12 col-sm-12">
    <div class="panel-body">
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
    @if (Session::has('notice'))
        <div class="alert alert-info">
            {{Session::get('notice')}}
        </div>
    @endif
    <br/> 
    <div id="data-content">
        @yield('content')
    </div>
    

</section>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('boots/js/bootstrap.min.js')}}"></script>
<!-- script hadle for pagination -->

<!-- AJAX CRUD operations -->
<script type="text/javascript">
    // add a new post
    $(document).on('click', '.add-modal', function() {
        $('.modal-title').text('Add');
        $('#addModal').modal('show');
    });
    $('.modal-footer').on('click', '.add', function() {
        $.ajax({
            type: 'POST',
            url: 'tablearticles',
            data: {
                '_token': $('input[name=_token]').val(),
                'title': $('#title_add').val(),
                'content': $('#content_add').val()
            },
            success: function(data) {
                $('.errorTitle').addClass('hidden');
                $('.errorContent').addClass('hidden');
                if ((data.errors)) {
                    setTimeout(function () {
                        $('#addModal').modal('show');
                    }, 500);

                    if (data.errors.title) {
                        $('.errorTitle').removeClass('hidden');
                        $('.errorTitle').text(data.errors.title);
                    }
                    if (data.errors.content) {
                        $('.errorContent').removeClass('hidden');
                        $('.errorContent').text(data.errors.content);
                    }
                } else {
                    $('#postTable').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.content + "</td><td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
                       
            }
        });
    });

    // Show a post
    $(document).on('click', '.show-modal', function() {
        $('.modal-title').text('Show');
        $('#id_show').val($(this).data('id'));
        $('#title_show').val($(this).data('title'));
        $('#content_show').val($(this).data('content'));
        $('#showModal').modal('show');
    });


    // Edit a post
    $(document).on('click', '.edit-modal', function() {
        $('.modal-title').text('Edit');
        $('#id_edit').val($(this).data('id'));
        $('#title_edit').val($(this).data('title'));
        $('#content_edit').val($(this).data('content'));
        id = $('#id_edit').val();
        $('#editModal').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: 'tablearticles/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#id_edit").val(),
                'title': $('#title_edit').val(),
                'content': $('#content_edit').val()
            },
            success: function(data) {
                $('.errorTitle').addClass('hidden');
                $('.errorContent').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        $('#editModal').modal('show');
                    }, 500);

                    if (data.errors.title) {
                        $('.errorTitle').removeClass('hidden');
                        $('.errorTitle').text(data.errors.title);
                    }
                    if (data.errors.content) {
                        $('.errorContent').removeClass('hidden');
                        $('.errorContent').text(data.errors.content);
                    }
                } else {
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.title + "</td><td>" + data.content + "</td><td>0 minutes ago</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            }
        });
    });

    // delete a post
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Delete');
        $('#id_delete').val($(this).data('id'));
        $('#title_delete').val($(this).data('title'));
        $('#deleteModal').modal('show');
        id = $('#id_delete').val();
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'tablearticles/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                $('.item' + data['id']).remove();
            }
        });
    });
</script>
</body>
</html>