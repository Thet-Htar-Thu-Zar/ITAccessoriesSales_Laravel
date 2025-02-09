@extends('Christopher_IT_Accessories.layout')
@section('content')

    <div class="container-product">
        <div class="row justify-content-center">
            @foreach ($showProducts as $p)
            @csrf
            <div class="col-12 col-md-6 col-lg-4 mt-20" style="margin-bottom: 40px;">
                <div class="card product-card shadow-sm border-0" style="transition: transform 0.3s ease-in-out; width: 90%;">
                    <div class="row no-gutters" style="background-color: #f8f9fa; border-radius: 10px; overflow: hidden;">
                        <div class="col-12">
                            <div class="card-img-wrapper" style="overflow: hidden;">
                                <img class="card-img-top" src="/images/product/{{$p['img_name']}}" alt="Product image" style="height: 300px; width: 100%; object-fit: cover; transition: transform 0.3s;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold" style="color: #ff6e61;">{{$p['brand']}}</h5>
                                <p class="card-text" style="color: #6c757d;">Price: <span style="font-weight: bold;">{{$p['price']}}</span></p>
                                <p class="card-text" style="color: #6c757d;">Description: {{$p['description']}}</p>

                                <a href="{{route('detail', $p['id'])}}" class="btn btn-sm mt-2" style="background-color: #ff6e61; color: white;">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mt-5 d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination custom-pagination">
                        {{$showProducts->links('pagination::bootstrap-4')}}
                    </ul>
                </nav>
            </div>

        </div>
    </div>

    <style>
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .product-card:hover .card-img-top {
            transform: scale(1.1);
        }
        .card-body h5 {
            margin-bottom: 15px;
            color: #ff6e61;
        }
        .card-text {
            margin-bottom: 15px;
            font-size: 14px;
        }
        .no-gutters {
            padding-bottom: 30px;
        }

        .custom-pagination {
                background-color: #f8f9fa;
                border-radius: 5px;
                padding: 10px;
            }

            .custom-pagination .page-item {
                margin: 0 5px;
            }

            .custom-pagination .page-link {
                color: #ff6e61;
                background-color: transparent;
                border: 1px solid #ff6e61;
                border-radius: 5px;
            }

            .custom-pagination .page-link:hover {
                background-color: #ff6e61;
                color: white;
            }

            .custom-pagination .active .page-link {
                background-color: #ff6e61;
                color: white;
            }

    </style>

@endsection
