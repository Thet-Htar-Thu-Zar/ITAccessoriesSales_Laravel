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

			<div class="col-lg-6 col-md-6 form-logincontainer">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-loginbox text-center ">
					<div class="logo ">
						<img src="/images/bubbles.png" width="100px">
					</div>
					<div class="heading mb-4">
						<h4>Login into your account</h4>
					</div>
					<form action="{{route('signin.post')}}" method="post">
                        @csrf
						<div class="form-logininput">
							<input type="email" placeholder="Email Address" required name="email">
						</div>
						<div class="form-logininput">
							<input type="password" placeholder="Password" required name="password">
						</div>

						<div class="text-left ">
							<button type="submit" class="btn">Login</button>
						</div>

						<div style="color: #777">Don't have an account??
							<a href="{{route('signup.post')}}" class="register-link">Register here</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
