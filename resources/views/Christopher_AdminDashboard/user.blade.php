@extends('Christopher_AdminDashboard.layout')
@section('content')

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

    <table class="table table-striped table-hover mt-3">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th class="text-center">Remove</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="@if($loop->index % 2 == 0) highlight-row @endif">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                    <a href="{{ route('deleteuser', $user->id) }}" class="btn btn-fantastic">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
