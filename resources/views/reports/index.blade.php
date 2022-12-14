<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>customer details</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>customer detais</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('customers.create') }}"> Create Company</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Customer Name</th>
<th>Customer B'day</th>
<th>Customer Email</th>
<th width="280px">Action</th>
</tr>
@foreach ($customer as $cust)
<tr>
<td>{{ $cust->id }}</td>
<td>{{ $cust->customer_name }}</td>
<td>{{ $cust->customer_dob }}</td>
<td>{{ $cust->customer_email }}</td>
<td>
<form action="{{ route('customers.destroy',$cust->id)}}" method="Post">
<a class="btn btn-primary" href="{{ route('customers.edit',$cust->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{{-- {!! $customer->links() !!} --}}
{!! $customer->render() !!}
</body>
</html>
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror



