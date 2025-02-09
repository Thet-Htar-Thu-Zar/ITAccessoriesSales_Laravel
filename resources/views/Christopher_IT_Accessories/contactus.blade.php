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

<form action="{{route('saveMessage')}}" method="post" class="w-60 m-auto mt-10">
    @csrf
    @foreach ($users as $user)

    <div class="container-fluid py-5 bg-light">
        <h2 class="section-title position-relative text-center text-uppercase mb-5">
            <span class="bg-dark text-white px-4 py-1 rounded mt-10">Contact</span>
        </h2>
        <div class="row justify-content-between">
            <div class="col-lg-6 mb-5">
                <div class="contact-form bg-white p-5 shadow-lg rounded">
                    <form id="contactForm" novalidate="novalidate">
                        <div class="form-group mb-4">
                            <label for="name" class="font-weight-bold">Your Name</label>
                            <input type="text" class="form-control border border-dark rounded-0" id="name" name="name" placeholder="Enter your name" value="{{$user->name}}" required data-validation-required-message="Please enter your name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="email" class="font-weight-bold">Your Email</label>
                            <input type="email" class="form-control border border-dark rounded-0" id="email" name="email" placeholder="Enter your email" value="{{$user->email}}" required data-validation-required-message="Please enter your email">
                        </div>
                        <div class="form-group mb-4">
                            <label for="message" class="font-weight-bold">Message</label>
                            <textarea class="form-control border border-dark rounded-0" rows="6" id="message" name="message" placeholder="Enter your message" required data-validation-required-message="Please enter your message"></textarea>
                        </div>
                        <button class="btn btn-dark btn-block rounded-0 py-2" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-white p-4 shadow-lg rounded">
                    <iframe class="w-150" style="height: 350px;width: 100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen aria-hidden="false" tabindex="0"></iframe>
                    <div class="mt-4">
                        <p><i class="fa fa-map-marker-alt text-dark"></i> 123 Street, New York, USA</p>
                        <p><i class="fa fa-envelope text-dark"></i> thethtarthuzar@christopher.com</p>
                        <p><i class="fa fa-phone-alt text-dark"></i> +959 768533932</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


      @endforeach
    </form>

@endsection
