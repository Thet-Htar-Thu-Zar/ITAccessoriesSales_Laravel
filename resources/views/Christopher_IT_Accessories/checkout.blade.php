@extends('Christopher_IT_Accessories.layout')
@section('content')

<div class="container w-50" style="margin-top: 6%;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h4 class="mb-4 text-center">Order Summary</h4>
            <table class="table table-borderless">
                <tr>
                    <td>Subtotal:</td>
                    <td class="text-right">{{$total}}</td>
                </tr>

                <tr>
                    <td>Delivery:</td>
                    <td class="text-right">5000</td>
                </tr>
                <tr>
                    <td>Tax:</td>
                    <td class="text-right">0</td>
                </tr>
                <tr class="font-weight-bold">
                    <td>Total:</td>
                    <td class="text-right">{{$total+5000}}</td>
                </tr>
            </table>

            <form action="{{route('orderPost')}}" method="post" class="mt-4">
                @csrf
                <div class="form-group">
                    <textarea name="address" id="address" class="form-control" placeholder="Enter your address..." rows="3" required></textarea>
                </div>
                <div class="form-group mt-3">
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number..." required>
                </div>

                <div class="mt-4">
                    <h5>Payment Type:</h5>
                    <div class="form-check">
                        <input type="radio" name="payment" value="cash" id="cash" class="form-check-input" required>
                        <label for="cash" class="form-check-label">Cash</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="payment" value="Visa Card" id="visa" class="form-check-input" required>
                        <label for="visa" class="form-check-label">Visa Card</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="payment" value="Mobile Banking" id="mobile" class="form-check-input" required>
                        <label for="mobile" class="form-check-label">Mobile Banking</label>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-lg w-100"
                            style="background-color: #f1b418; color: rgb(19, 15, 15); border-radius: 30px; padding: 7px 0;
                                   font-weight: bold; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">
                        Confirm Order
                    </button>
                </div>

                <style>
                    .btn:hover {
                        background-color: #201d16;
                        transform: scale(1.05);
                        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
                    }
                </style>

            </form>
        </div>
    </div>
</div>
@endsection
