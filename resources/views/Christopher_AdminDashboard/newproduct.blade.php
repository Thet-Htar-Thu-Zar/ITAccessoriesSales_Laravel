@extends('Christopher_AdminDashboard.layout')
@section('content')
@if($errors->any())
<div class="alert alert-warning text-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  </div>
@endif

      <div class="newProduct">
        <form action="{{route('saveProduct')}}" method="post" class="container bg-light p-5 rounded-lg shadow" enctype="multipart/form-data">
          @csrf

          <h2 class="text-center mb-5 text-primary">Add New Product</h2>

          <div class="row mb-4">
            <div class="col-md-4">
              <label for="category" class="form-label">Category:</label>
              <input type="text" class="form-control border-primary" id="category" name="category" placeholder="Category" required>
            </div>
            <div class="col-md-4">
              <label for="brand" class="form-label">Brand:</label>
              <input type="text" class="form-control border-primary" id="brand" name="brand" placeholder="Brand" required>
            </div>
            <div class="col-md-4">
              <label for="color" class="form-label">Color:</label>
              <input type="text" class="form-control border-primary" id="color" name="color" placeholder="Color" required>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <label for="price" class="form-label">Price:</label>
              <input type="text" class="form-control border-primary" id="price" name="price" placeholder="Price" required>
            </div>
            <div class="col-md-6">
              <label for="stock_qty" class="form-label">Quantity:</label>
              <input type="text" class="form-control border-primary" id="stock_qty" name="stock_qty" placeholder="Quantity" required>
            </div>
          </div>

          <div class="mb-4">
            <label for="imgInput" class="form-label">Product Image:</label>
            <div class="text-center p-3 mb-3 bg-white border rounded" style="min-height: 120px; position: relative;">
              <img src="" alt="Image Preview" id="imgPreview" class="rounded-circle" style="width: 120px; height: 120px; display:none; object-fit: cover;">
            </div>
            <input type="file" class="form-control-file" id="imgInput" name="img_name" required>
          </div>

          <div class="mb-4">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control border-primary" id="description" name="description" placeholder="Write a brief product description" rows="3" required></textarea>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">Save Product</button>
              <button type="reset" class="btn btn-secondary px-4 py-2 rounded-pill">Cancel</button>
            </div>
            <a href="{{route('addDetail')}}" class="btn btn-outline-primary px-4 py-2 rounded-pill">Add New Color</a>
          </div>
        </form>
      </div>

      <script>
        document.getElementById('imgInput').addEventListener('change', function(event) {
          const [file] = event.target.files;
          if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
              const imgPreview = document.getElementById('imgPreview');
              imgPreview.src = e.target.result;
              imgPreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
          }
        });
      </script>


    @endsection
