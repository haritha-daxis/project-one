<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Customer Form - </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Customer</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('customers.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('customerss.update',$customer->customer_id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Customer Name:</strong>
<input type="text" name="name" value="{{ $customer->customer_name }}" class="form-control" placeholder="Customer name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Customer Dob:</strong>
    <input type="text" name="bday" value="{{$customer->customer_dob }}" class="form-control" placeholder="B'day">
    @error('bday')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Customer Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Company Email" value="{{ $customer->customer_email }}">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
</body>
</html>
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
