<?php
$total = 0;
?>
@extends('Christopher_IT_Accessories.layout')
<link rel="stylesheet" href="{{ asset('css/stylecart.css') }}">
@section('content')
@if($list->count()>0)

            <div class="col-lg-8 table-responsive mb-8">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Color</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        @foreach ($list as $cart)
                        <tr>
                            <td class="align-middle"><img src="/images/product/{{$cart->img_name}}" alt="" style="width:100px; height:100px"> {{$cart->category}}</td>
                            <td class="align-middle">{{$cart->brand}}</td>
                            <td class="align-middle">{{$cart->price}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a href="{{route('desQty',['id'=>$cart->cart_id,'qty'=>$cart->qty])}}">
                                        <button class="btn btn-sm btn-minus me-2" style="background-color: rgb(255, 213, 0);" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </a>
                                    </div>

                                </a>{{$cart->qty}}
                                    <div class="input-group-btn">
                                        <a href="{{route('incQty',['id'=>$cart->cart_id,'qty'=>$cart->qty])}}">
                                        <button class="btn btn-sm btn-plus mx-2" style="background-color: rgb(255, 213, 0);">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{$cart->color}}</td>
                            <td class="align-middle">{{$cart->price*$cart->qty}}</td>
                            <input type="hidden" value="{{$total+=$cart->price*$cart->qty}}">
                            <td class="align-middle"><a href="{{route('remove',$cart->cart_id)}}"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <form action="{{route('checkout',$total)}}" class="text-center" method="post">
                @csrf
                <input type="submit" name="" id="" value="CheckOut" class="btn" style="background-color: #363a42;color: white;font-weight:700">
            </form>
            @else
            <div class="empty-cart text-center" style="margin-top: 15%; padding: 20px;">
                <img src="/images/cart1.jpg" alt="Empty Cart" style="width: 100px; margin-bottom: 20px;">
                <h2 style="font-weight: bold; color: #555;">Your Cart is Empty</h2>
                <p style="color: #888; font-size: 16px;">Looks like you haven’t added anything to your cart yet.</p>
                <a href="{{route('product')}}" class="btn" style="margin-top: 20px; padding: 10px 20px; font-size: 16px; color:white; background-color:#363a42">Start Shopping</a>
            </div>

            @endif
    <!-- Cart End -->
@endsection

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
