@extends('Christopher_AdminDashboard.layout')
@section('content')

<table class="table table-striped table-hover mt-3" style="border-spacing: 0 10px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Remove</th>
        </tr>
    </thead>

    <tbody>
        @foreach($messages as $msg)
            <tr>
                <td>{{$msg->name}}</td>
                <td>{{$msg->email}}</td>
                <td>{{$msg->message}}</td>
                <td class="text-center">
                    <a href="{{route('deletemessage', $msg->msg_id)}}" class="btn btn-fantastic"><i
                            class="fas fa-trash-alt"></i></a>
                </td>
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

    .table td,
    .table th {
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