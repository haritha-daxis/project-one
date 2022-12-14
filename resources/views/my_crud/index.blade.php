<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel AJAX CRUD Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body class="container mt-5">

    <div class="container">
        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2>Laravel AJAX Example</h2>
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="btn-add"data-target="#myModal">Add</button>
                {{-- <button class="btn btn-success" id="btn-add"> --}}

            </div>
        </div>
        <div>
            <table class="table table-inverse">
                <thead>
                    <tr>
                        {{-- sales_item','sales_qty','customer_id' --}}
                        <th>ID</th>
                        <th>item</th>
                        <th>qty</th>
                        <th>customer_id</th>

                    </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    @foreach ($sales as $data)
                    <tr id="sales{{$data->id}}">
                        <td>{{$data->sales_id}}</td>
                        <td>{{$data->sales_item}}</td>
                        <td>{{$data->sales_qty}}</td>
                        <td>{{$data->customer_id_}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{--

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a large modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

                --}}
            <div class="modal fade" id="formModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="formModalLabel">Create Todo</h4>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter title" value="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            placeholder="Enter Description" value="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="todo_id" name="todo_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js">

    jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#myForm').trigger("reset");
    jQuery('#formModal').modal('show');
    jQuery('#btn-save').val("add");

    });

    // CREATE

    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            title: jQuery('#title').val(),
            description: jQuery('#description').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var todo_id = jQuery('#todo_id').val();
        var ajaxurl = 'todo';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.description + '</td>';
                if (state == "add") {
                    jQuery('#todo-list').append(todo);
                } else {
                    jQuery("#todo" + todo_id).replaceWith(todo);
                }
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide')
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</body>
</html>
