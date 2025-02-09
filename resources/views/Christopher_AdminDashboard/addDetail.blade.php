@extends('Christopher_AdminDashboard.layout')
@section('content')
@if($errors->any())
<div class="alert alert-warning text-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  </div>
@endif

<div class="newDetailForm">
    <form action="{{route('saveDetail')}}" method="post" class="container bg-light p-5 rounded shadow-lg w-50 mt-5">
      @csrf

      <h3 class="text-center mb-4 text-info">Add New Product Detail</h3>

      <div class="mb-4">
        <label for="color" class="form-label font-weight-bold">Color:</label>
        <input type="text" class="form-control border-info" id="color" name="color" placeholder="Enter product color" required>
      </div>

      <div class="mb-4">
        <label for="stock_qty" class="form-label font-weight-bold">Quantity:</label>
        <input type="text" class="form-control border-info" id="stock_qty" name="stock_qty" placeholder="Enter stock quantity" required>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-info px-4 py-2 rounded-pill">Save</button>
        <button type="reset" class="btn btn-outline-info px-4 py-2 rounded-pill ml-3">Cancel</button>
      </div>
    </form>
  </div>

@endsection
