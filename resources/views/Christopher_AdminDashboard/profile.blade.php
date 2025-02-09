@extends('Christopher_AdminDashboard.layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 15px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #3494be;
            box-shadow: 0 0 0 0.2rem rgba(52, 148, 190, 0.25);
        }
        .btn-custom {
            background-color: #3494be;
            color: #fff;
            border-radius: 5px;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
        }
        .btn-custom:hover {
            background-color: #217ab0;
            color: #fff;
        }
        .btn-reset {
            background-color: #e2e6ea;
            color: #495057;
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 12px 24px;
            font-size: 16px;
        }
        .btn-reset:hover {
            background-color: #d6d9db;
            color: #495057;
        }
        .form-label {
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container ">
        <form action="{{ route('admin.profileUpdate') }}" method="post" class="form-container w-75 m-auto">
            @csrf
            <div class="mb-4">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="name" required>
                {{-- value="{{$ad->name}}" --}}
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                {{-- value="{{$ad->email}}" --}}
            </div>
            <div class="mb-4">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-custom">Update</button>
                <button type="reset" class="btn btn-reset">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>


    </form>
@endsection
