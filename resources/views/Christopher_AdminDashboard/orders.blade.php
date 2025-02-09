@extends('Christopher_AdminDashboard.layout')
@section('content')

<div class="table-responsive">
    <table class="table mt-5 table-hover table-striped" style="background-color: #f1f1f1; color: #333; border-spacing: 0 10px;">
        <thead class="thead-light">
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
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Change</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr class="align-middle" style="background: #ffffff; transition: background 0.3s;">
                <td>{{$order->category}}</td>
                <td>{{$order->brand}}</td>
                <td>{{$order->color}}</td>
                <td>${{$order->price}}</td>
                <td>{{$order->qty}}</td>
                <td>${{$order->qty * $order->price}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->payment}}</td>
                <td>{{$order->created_at->format('m-d-Y')}}</td>
                <td>
                    <span class="badge badge-{{ $order->order_status == 'Pending' ? 'warning' : 'success' }}" style="color:#FF4500;">
                        <i class="fas {{ $order->order_status == 'Pending' ? 'fa-clock' : 'fa-check-circle' }}"></i>
                        {{$order->order_status}}
                    </span>
                </td>
                <td>
                    <a href="{{route('change',$order->order_id)}}" class="btn btn-sm btn-outline-dark rounded-pill">
                        <i class="fas fa-sync-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <style>
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

    /* Button styles */
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
