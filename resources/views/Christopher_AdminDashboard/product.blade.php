@extends('Christopher_AdminDashboard.layout')
@section('content')

  <table class="table table-striped table-hover mt-5 align-middle">
    <thead class="table-dark">
      <tr>
        <th scope="col">Category</th>
        <th scope="col">Brand</th>
        <th scope="col">Image</th>
        <th scope="col">Color</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Edit</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->category }}</td>
            <td>{{ $product->brand }}</td>
            <td>
                <img src="/images/product/{{ $product->img_name }}" alt="Product Image" class="img-thumbnail" style="width: 100px; height: 100px;">
            </td>
            <td>{{ $product->color }}</td>
            <td>{{ number_format($product->price, 2) }}</td>
            <td>{{ $product->stock_qty }}</td>

            <td>
                <a href="{{ route('edit', ['pid' => $product->id, 'detailId' => $product->detailId]) }}" class="btn btn-outline-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Product">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
            <td>
                <a href="{{ route('admin.remove', $product->detailId) }}" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove Product">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-5 d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination custom-pagination">
            {{$products->links('pagination::bootstrap-4')}}
        </ul>
    </nav>
</div>
@endsection
