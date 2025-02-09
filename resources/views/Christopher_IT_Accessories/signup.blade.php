@extends('Christopher_IT_Accessories.layout')
@section('content')
<br>
<br>
<br>
 @if($errors->any())
<div class="alert alert-warning text-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  </div>
@endif

<div class="container-fluid">
    <div class="row-login">
        <div class="col-lg-6 col-md-6 d-none d-md-block image-logincontainer"></div>

        <div class="col-lg-6 col-md-6 form-registercontainer">
            <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-registerbox text-center">

                <div class="logo mb-3">
                    <img src="/images/bubbles.png" width="100px" height="100px" style="margin-left: 90%">
                </div>
                <div class="heading ">
                    <h4>Create an account</h4>
                </div>
        <form action="{{route('signup.post')}}" method="post" class="w-50 m-auto">
            @csrf
            <div class="form-registerinput">

                <input type="text" class="form-control" id="username" placeholder="Username" name="name">
            </div>
            <div class="form-registerinput">

                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-registerinput">

                <input type="password" class="form-control" id="pwd" placeholder="Password" id="pwd" name="password">
            </div>
            <div class="form-registerinput">

                <input type="password" class="form-control" id="pwd" placeholder="ConfirmPassword" id="pwd" name="password_confirmation">
            </div>

            <div class="text-left mb-3">
                <button type="submit" class="btn">Register</button>
            </div>
            <div class="text-left mb-3">
                <button type="reset" class="btn">Cancel</button>
            </div>

            <div style="color: #777">Already have an account?<br>
                <a href="{{route('signin.post')}}" class="login-link">Login here</a>
            </div>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection
