<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>report.blade.php</title>
</head>
<body onload='load()'>
    {{-- <body> --}}
        {{-- <button id="chs "class="btn btn-warning" value="show">Show</button> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="float-left">

​
    <h2 class="text-danger">CUSTOMER  have <u>sale</u></h2>
    <table id='chs' class="table table-success table-striped" border="1 px solid">
      <tr>
        <td>invoice_no</td>
        <td>customer_name</td>
        <td>email</td>
      </tr>
    </table>

                </div>
            </div>
        </div>
    </div>
            {{-- <div class="container">
                <div class="row">
​ <div class="col-md-6">
    <div class="float-right">

    <h2 class="text-success">CUSTMERS with NO sale</h3>
    <table id='no-sale' class="table table-success table-striped" border="1 px solid">
        <tr>
            <td>customer_name</td>
            <td>email</td>
        </tr>
    </table>

</div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
​ <div class="col-md-6">
<div class="float-right">
    <h2 class="text-secondary">CUSTOMER with sale COUNT</h2>
    <table id='tc' class="table table-success table-striped" border="1 px solid">
        <tr>
            <td>name</td>
            <td>sales_count</td>
        </tr>
    </table>


</div>
</div>
</div>
</div>
    <div class="container">
        <div class="row">
​ <div class="col-md-6">
<div class="float-right">
    <h2 class="text-primary">PRODUCTS with sale COUNT</h2>
    <table id='pc' class="table table-success table-striped" border="1 px solid">
        <tr>
            <td>product_name</td>
            <td>sales_count</td>
        </tr>
    </table>

​
</div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
​ <div class="col-md-6">
<div class="float-right">
     <h2 class="text-info">CUSTOMER  have <u>sale</u></h2>
    <table id='det' class="table table-success table-striped" border="1 px solid">
      <tr>
        <td>invoice_no</td>
        <td>name</td>
        <td>email</td>
      </tr>
    </table>
</div>
</div>
</div>
</div> --}}



<script>
         function load(){
        //CUSTOMER WITH SALE
        $.ajax({
                url:'report',
                type:'GET',
                success:function(response){
                    console.log(response.data);
                    cust="";
                    for(i in response.data){
                        cust+="<tr>";
                        cust+="<td>"+"INV-00"+response.data[i]['id']+"</td>";
                        cust+="<td>"+response.data[i]['customer_name']+"</td>";
                        cust+="<td>"+response.data[i]['customer_email']+"</td>";
                    }
                    $('#chs').append(cust);
                }
            })
        // })
        // })
        //CUSTOMER SALES WITH COUNT
        //     $.ajax({
        //         url:'get_count',
        //         type:'GET',
        //         success:function(response){
        //         //    console.log(response.dat)
        //             detail="";
        //             $.each(response.dat, function(index, value) {
        //                 // console.log('ONE');
        //                 // console.log(value);
        //                 // console.log('TWO');
        //                 detail+="<tr>";
        //                 detail+="<td>"+value.customer+"</td>";
        //                 detail+="<td>"+value.count+"</td>";
        //             });
        //             $('#tc').append(detail);
        //         }
        //     })
        // //CUSTOMERS WITH NO SALE
        //     $.ajax({
        //         url:'no_sale',
        //         type:'GET',
        //         success:function(response){
        //             // console.log(response.data);
        //             detail="";
        //             for(i in response.data){
        //                 detail+="<tr>";
        //                 detail+="<td>"+response.data[i]['customer_name']+"</td>";
        //                 detail+="<td>"+response.data[i]['email']+"</td>";
        //             }
        //             $('#ns').append(detail);
        //         }
        //     })
        // //PRODUCT COUNT IN SALES
        //     $.ajax({
        //         url:'pro_count',
        //         type:'GET',
        //         success:function(response){
        //             // console.log(response.res)
        //             detail="";
        //             $.each(response.res, function(index, value) {
        //                 // console.log('a');
        //                 // console.log(value);
        //                 // console.log('b');
        //                 detail+="<tr>";
        //                 detail+="<td>"+value.product+"</td>";
        //                 detail+="<td>"+value.count+"</td>";
        //             });
        //             $('#pc').append(detail);
        //         }
        //     })
        // }
     </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
