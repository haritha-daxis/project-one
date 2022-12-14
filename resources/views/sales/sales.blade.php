<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sales -Customer -Product-Category</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>1,2,3 shopee</h2>
                </div>
                <div class="pull-right mb-2">
                    {{-- <a class="btn btn-success" onClick="add()" id="createNewProduct" href="javascript:void(0)">Add Product</a> --}}
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)">Add Product</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="ajax-crud-datatable">
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- boostrap company model -->
    <div class="modal fade" id="product-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="productModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="productForm" name="productForm" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Customer Name</label>
                            <div class="col-sm-12">
                                {{-- <input type="text" class="form-control" id="cust_name" name="cust_name"
                                    placeholder="Enter Customer Name" maxlength="50" required=""> --}}
                           {{-- selection starts --}}

                           <select class="js-states browser-default select2" name="cust_name" id="cust_name">
                            <option value="" disabled selected>Customer</option>
                            @foreach ($customer as $data)
                               {{-- <option value="$item->category_id"{{$item->category_id ? 'selected' : ''}}>{{ $item->category_name}}</option> --}}
                               <option value={{$data->id}}>{{ $data->customer_name}}</option>

                               {{-- <option value="$item->category_id">{{ $item->category_name}}</option> --}}
                               @endforeach

                        </select>


                           {{-- end --}}

                                </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Product Name</label>
                            <div class="col-sm-12">
                                {{-- <input type="text" class="form-control" id="prod_name" name="prod_name"
                                    placeholder="Enter product Name" maxlength="50" required=""> --}}
{{--  --}}


                    <select class="js-states browser-default select2" name="prod_name" id="prod_name">
                         <option value="" disabled selected>Product</option>
                              @foreach ($product as $item)
                                           {{-- <option value="$item->category_id"{{$item->category_id ? 'selected' : ''}}>{{ $item->category_name}}</option> --}}
                                  <option value={{$item->product_name}}>{{ $item->product_name}}</option>

                                         {{-- <option value="$item->category_id">{{ $item->category_name}}</option> --}}
                              @endforeach

                            </select>



{{--  --}}

                                </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="qty" name="qty"
                                    placeholder="Enter qty" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    {{-- <table class="table table-striped"id="ajax_table">
        <thead>
            <tr>
                <th scope="col">sales_id</th>
                <th scope="col">invoice_number</th>
                <th scope="col">sales_item</th>
                <th scope="col">sales_qty</th>
            </tr>
        </thead> --}}
        <!-- end bootstrap model -->
</body>
<script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#ajax-crud-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('sales') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'customer_id',
                    name: 'cust_name'
                },
                {
                    data: 'product_name',
                    name: 'prod_name'
                },
                {
                    data: 'sales_qty',
                    name: 'qty'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    function add() {
       // $('#createNewProduct').click(function(){

        $('#productForm').trigger("reset");
      //  $('#category').trigger("reset");
        $('#productModal').html("Add Product");
        $('#product-modal').modal('show');
        $('#id').val('');
    }


    function editFunc(id) {
        $.ajax({
            type: "POST",
            url: "{{ url('edit-sales') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('#productModal').html("Edit Customer");
                $('#product-modal').modal('show');
                $('#id').val(res.id);
                $('#cust_name').val(res.customer_id);
                $('#prod_name').val(res.product_name);
                $('#qty').val(res.sales_qty);
                console.log(val(res.sales_qty))
              //  $('#price').val(res.email);
            }
        });
    }

    function deleteFunc(id) {
        if (confirm("Delete Record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('delete-customer') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#ajax-crud-datatable').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }
    $('#productForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('store-sales') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#product-modal").modal('hide');
                var oTable = $('#ajax-crud-datatable').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
    //
    //
    function add() {
        $('#productForm').trigger("reset");
        $('#productModal').html("Add product");
        $('#product-modal').modal('show');
        $('#id').val('');
    }
    //
    function editFunc(id) {
        $.ajax({
            type: "POST",
            url: "{{ url('edit-sales') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('#productModal').html("Edit Product");
                $('#product-modal').modal('show');
                $('#id').val(res.id);
                $('#cust_name').val(res.customer_id);
                $('#prod_name').val(res.product_name);
                $('#qty').val(res.sales_qty);
            }
        });
    }

    // function deleteFunc(id) {
    //     if (confirm("Delete Record?") == true) {
    //         var id = id;
    //         // ajax
    //         $.ajax({
    //             type: "POST",
    //             url: "{{ url('delete-product') }}",
    //             data: {
    //                 id: id
    //             },
    //             dataType: 'json',
    //             success: function(res) {
    //                 var oTable = $('#ajax-crud-datatable').dataTable();
    //                 oTable.fnDraw(false);
    //             }
    //         });
    //     }
    // }

    //data table
    // $('#ajax-crud-datatable').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ url('form') }}",
    //     columns: [
    //         //{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
    //         {
    //             data: 'id',
    //             name: 'id'
    //         },
    //         {
    //             data: 'name',
    //             name: 'name'
    //         },
    //         {
    //             data: 'price',
    //             name: 'price'
    //         },
    //         // { data: 'category', name: 'category' },
    //         // { data: 'email', name: 'email' },
    //         // { data: 'address', name: 'address' },
    //         // { data: 'created_at', name: 'created_at' },
    //         {
    //             data: 'action',
    //             name: 'action',
    //             orderable: false
    //         },
    //     ],
    //     order: [
    //         [0, 'desc']
    //     ]
    // });
    // $('#productForm').click(function(e) {
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     $.ajax({
    //         type: 'POST',
    //         url: "{{ url('store-product') }}",
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: (data) => {
    //             $("#product-modal").modal('hide');
    //             var oTable = $('#ajax-crud-datatable').dataTable();
    //             oTable.fnDraw(false);
    //             $("#btn-save").html('Submit');
    //             $("#btn-save").attr("disabled", false);
    //         },
    //         error: function(data) {
    //             console.log(data);
    //         }
    //     });
    // });


    //     $.ajax({
    // type:"GET",
    // url: "{{ url('sales') }}",
    // //data: { id: id },
    // dataType: 'json',
    // headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },

    // success: function(response){
    //     $.each(data, function(i, item) {
    //         var $tr = $('<tr>').append(
    //             $('<td>').text(item.sales_id),
    //             $('<td>').text(item.invoice_number),
    //             $('<td>').text(item.sales_item),
    //                 $('<td>').text(item.sales_qty)
    //         ); //.appendTo('#records_table');
    //         console.log($tr.wrap('<p>').html());
    //     });
    // });
    // table.destroy();
    //                     table = $('#ajax-crud-datatable').DataTable({
    //                         'destroy': true,
    //                         'paging': true,
    //                         'lengthChange': true,
    //                         'searching': true,
    //                         'ordering': true,
    //                         'info': true,
    //                         'autoWidth': true
    //                 }

    //         );
    //         $('#ajax-crud-datatable').dataTable( {
    //     paging: false,
    //     searching: false
    // } );
</script>

</html>
