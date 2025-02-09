@extends('Christopher_IT_Accessories.layout')
@section('content')

@if($orders->count() > 0)
<h2 class="text-center text-info">Your Order History</h2>

<div class="order-timeline mt-5">
  <ul class="timeline">
    @foreach ($orders as $cart)
      <li class="timeline-item mb-5" style="width: 60%; margin-left: 20%">
        <div class="timeline-badge bg-primary"></div>
        <div class="timeline-panel shadow-sm p-4 border rounded">
          <div class="timeline-heading">
            <h5 class="timeline-title text-info">
              {{$cart->category}} - {{$cart->brand}}
            </h5>
            <p class="timeline-time text-muted"><strong>Order Total:</strong> <span class="text-success">${{$cart->price * $cart->qty}}</span></p>
          </div>
          <div class="timeline-body">
            <div class="row">
              <div class="col-md-4">
                <img src="/images/product/{{$cart['img_name']}}" alt="Product Image" class="img-fluid rounded" style="width: 100%; height: auto;">
              </div>
              <div class="col-md-8">
                <p class="text-muted">
                  <strong>Price:</strong> ${{$cart->price}} <br>
                  <strong>Quantity:</strong> {{$cart->qty}} <br>
                  <strong>Color:</strong> {{$cart->color}}
                </p>
              </div>
            </div>
          </div>
        </div>
      </li>
    @endforeach
  </ul>
</div>
@else

<div class="text-center" style="margin-top: 15%; padding: 30px; background-color: #e9ecef; border-radius: 8px;">
    <h2 style="font-size: 24px; color: #6c757d; font-weight: 300;">
        <i class="fas fa-info-circle" style="color: #6c757d; margin-right: 8px;"></i>
        No order history available!
    </h2>
</div>
@endif

@endsection

