@extends('Christopher_AdminDashboard.layout')
@section('content')

<table class="table table-striped table-hover mt-3" style="border-spacing: 0 10px;">
    <thead>
      <tr>
        <th>Category</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Amount</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Payment</th>
      </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td>{{$sale->category}}</td>
            <td>{{$sale->brand}}</td>
            <td>{{$sale->color}}</td>
            <td>${{$sale->price}}</td>
            <td>{{$sale->qty}}</td>
            <td>${{$sale->qty * $sale->price}}</td>
            <td>{{$sale->name}}</td>
            <td>{{$sale->phone}}</td>
            <td>{{$sale->address}}</td>
            <td style=" color: #FF4500; font-weight: bold">{{$sale->payment}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<style>
    .table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }
    .table th {
        background-color: #3494be;
        color: white;
        text-transform: uppercase;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #F0F8FF;
    }
    .table-hover tbody tr:hover {
        background-color: #E6E6FA;
        transition: background-color 0.3s ease-in-out;
    }
    .table td, .table th {
        padding: 15px;
        vertical-align: middle;
        border-top: 2px solid #ffffff;
    }

    .btn-fantastic {
        background-color: #FF4500;
        color: white;
        border-radius: 50px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        padding: 5px 20px;
    }
    .btn-fantastic:hover {
        background-color: #FF6347;
        box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
        transform: scale(1.05);
    }
</style>


@endsection
