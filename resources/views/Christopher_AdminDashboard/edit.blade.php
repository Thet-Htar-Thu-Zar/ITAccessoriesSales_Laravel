@extends('Christopher_AdminDashboard.layout')
@section('content')
@foreach($product as $p)

<form action="{{ route('save', ['pid' => $p->id, 'detailId' => $p->detailId]) }}" method="post" class="w-50 m-auto mt-5 shadow p-4 rounded bg-light">
    @csrf

    <div class="mb-3">
        <label for="category" class="form-label">Category:</label>
        <input type="text" class="form-control" id="category" placeholder="Enter product category" value="{{ $p->category }}" name="category" required>
    </div>

    <div class="mb-3">
        <label for="brand" class="form-label">Brand:</label>
        <input type="text" class="form-control" id="brand" placeholder="Enter product brand" value="{{ $p->brand }}" name="brand" required>
    </div>

    <div class="mb-3">
        <label for="color" class="form-label">Color:</label>
        <input type="text" class="form-control" id="color" placeholder="Enter product color" value="{{ $p->color }}" name="color" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" class="form-control" id="price" placeholder="Enter product price" value="{{ $p->price }}" name="price" required>
    </div>

    <div class="mb-3">
        <label for="stock_qty" class="form-label">Quantity:</label>
        <input type="number" class="form-control" id="stock_qty" placeholder="Enter product quantity" value="{{ $p->stock_qty }}" name="stock_qty" required>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-success px-4">Save</button>
        <button type="reset" class="btn btn-secondary px-4">Cancel</button>
    </div>
</form>

@endforeach
@endsection
