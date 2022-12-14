<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Customer Form - CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Customer</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Customer Name:</strong>
<input type="text" name="name" class="form-control" placeholder="Customer Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Customer b'day:</strong>
    <input type="date" name="dob" class="form-control" placeholder="birth day">
    @error('dob')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Customer Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Customer Email">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
