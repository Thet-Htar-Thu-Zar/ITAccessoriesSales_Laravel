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

<div class="container" style="margin-top: 7%">
    @foreach($products as $product)
    <div class="row mb-5 align-items-center border-bottom pb-3 mt-20">
        <div class="col-md-5">
            <img src="/images/product/{{$product->img_name}}" alt="" class="img-fluid rounded" style="height: 350px; width:100%; object-fit: cover;">
        </div>
        <div class="col-md-7">
            <h3 class="mb-3">Brand: {{$product->brand}}</h3>
            <p><strong>Category:</strong> {{$product->category}}</p>
            <p><strong>Price:</strong> ${{$product->price}}</p>
            <p><strong>Description:</strong> {{$product->description}}</p>

            <form action="{{route('AddToCart',$product->id)}}" method="post">
                @csrf
                <div class="d-flex flex-wrap align-items-center">
                    <div class="form-group mr-3 mb-3">
                        <label for="colorSelect">Color:</label>
                        <select name="color" id="colorSelect" class="form-control" style="width: 150px;">
                            <option value="">Select Color</option>
                            @foreach($productDetail as $detail)
                                <option value="{{$detail->color}}">{{$detail->color}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mr-10 mb-3">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="qty" id="quantity" class="form-control" min="1" max="{{$detail->stock_qty}}" style="width: 100px;">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn" style="background-color: #34495e;color: white">Add To Cart</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
