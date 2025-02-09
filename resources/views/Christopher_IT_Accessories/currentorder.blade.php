@extends('Christopher_IT_Accessories.layout')
@section('content')
@if($orders->count()>0)

  <h2 class="text-center text-primary">Current Order</h2>
<div class="table-responsive mt-5">
  <table class="table table-bordered table-striped align-middle">
    <thead class="table-dark text-center">
      <tr>
        <th>Category</th>
        <th>Brand</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Color</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $cart)
        <tr>
          <td class="text-center">{{$cart->category}}</td>
          <td class="text-center">{{$cart->brand}}</td>
          <td class="text-center">
            <img src="/images/product/{{$cart->img_name}}" alt="" class="img-thumbnail" style="width:100px; height:100px">
          </td>
          <td class="text-center">${{$cart->price}}</td>
          <td class="text-center">{{$cart->qty}}</td>
          <td class="text-center">{{$cart->color}}</td>
          <td class="text-center">${{$cart->price * $cart->qty}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else

  <div class="text-center" style="margin-top: 15%; padding: 30px; background-color: #e9ecef; border-radius: 8px;">
    <h2 style="font-size: 24px; color: #6c757d; font-weight: 300;">
        <i class="fas fa-info-circle" style="color: #6c757d; margin-right: 8px;"></i>
        No Current Order!
    </h2>
</div>

@endif

@endsection
