@extends('Christopher_IT_Accessories.layout')
@section('content')

<div class="container" style="margin-top: 3%">
    <div class="row justify-content-center" >
        @foreach ($searchProducts as $p)
        <div class="col-md-4 mt-5">
            <div class="card shadow-sm border-0" style="width: 100%; height: 100%;">
                <img class="card-img-top rounded-top" src="/images/product/{{$p['img_name']}}" alt="Product image" style="height: 250px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title font-weight-bold">Brand: {{$p['brand']}}</h5>
                    <p class="card-text text-muted">Price: ${{$p['price']}}</p>
                    <a href="{{route('detail', $p['id'])}}" class="btn btn-outline-danger btn-block mt-3">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-auto">
            {{$searchProducts->appends(['search' => request()->input('search')])->links()}}
        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
</style>

@endsection
