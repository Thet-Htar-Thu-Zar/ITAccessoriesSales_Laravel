@extends('Christopher_AdminDashboard.layout')
@section('content')
<head>
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap.css">
</head>

<div class="row">
    <!-- Product Card -->
    <div class="col-md-4">
      <div class="card shadow-lg mb-4">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-briefcase"></i> Product</h5>
          <p class="card-text">Manage all your products here.</p>
          <a href="{{route('adminProduct')}}" class="btn btn-primary rounded-pill">Go to Products</a>
        </div>
      </div>
    </div>

    <!-- New Product Card -->
    <div class="col-md-4">
      <div class="card shadow-lg mb-4">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-plus-circle"></i> New Product</h5>
          <p class="card-text">Add new products to your catalog.</p>
          <a href="{{route('newProduct')}}" class="btn btn-success rounded-pill">Add New Product</a>
        </div>
      </div>
    </div>

    <!-- Orders Card -->
    <div class="col-md-4">
      <div class="card shadow-lg mb-4">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-box"></i> Orders</h5>
          <p class="card-text">Track and manage customer orders.</p>
          <a href="{{route('adminOrder')}}" class="btn btn-info rounded-pill">View Orders</a>
        </div>
      </div>
    </div>

    <!-- Dashboard Card -->
    <div class="col-md-4">
      <div class="card shadow-lg mb-4">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-user"></i> Customers</h5>
          <p class="card-text">View customers and manage.</p>
          <a href="{{route('admin.user')}}" class="btn btn-warning rounded-pill">View Customers</a>
        </div>
      </div>
    </div>

    <!-- Sales Card -->
    <div class="col-md-4">
      <div class="card shadow-lg mb-4">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-dollar-sign"></i> Sales</h5>
          <p class="card-text">Manage and track your sales.</p>
          <a href="{{route('adminSales')}}" class="btn btn-danger rounded-pill">Go to Sales</a>
        </div>
      </div>
    </div>

    <!-- Contact Card -->
    <div class="col-md-4">
      <div class="card shadow-lg mb-4">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-envelope"></i> Contact</h5>
          <p class="card-text">View and respond to customer inquiries.</p>
          <a href="{{route('admin.message')}}" class="btn btn-dark rounded-pill">Go to Contact</a>
        </div>
      </div>
    </div>
  </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-custom" style="background: linear-gradient(135deg, #1e90ff, #16546f);">
                    <div class="card-body text-center">
                        <i class="fas fa-user-plus fa-3x text-light"></i>
                        <h4 class="card-title text-light mt-4">Register: {{$user}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom" style="background: linear-gradient(135deg, #1e90ff, #16546f);">
                    <div class="card-body text-center">
                        <i class="fas fa-box fa-3x text-light"></i>
                        <h4 class="card-title text-light mt-4">Order: {{$order}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom" style="background: linear-gradient(135deg, #1e90ff, #16546f);">
                    <div class="card-body text-center">
                        <i class="fas fa-dollar-sign fa-3x text-light"></i>
                        <h4 class="card-title text-light mt-4">Sale Amount:</h4>
                        <h5 class="card-title text-light">${{$sale}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom" style="background: linear-gradient(135deg, #1e90ff, #16546f);">
                    <div class="card-body text-center">
                        <i class="fas fa-list-alt fa-3x text-light"></i>
                        <h4 class="card-title text-light mt-4">Category: {{$category}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container mt-5">
            <div class="row">
                <!-- Orders By Day -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="text-center">Orders By Day</h3>
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Sales By Day -->

                <div class="col-md-6 mb-4">
                    <div class="card" style="border-radius: 16px; border: none; background-color: #fdfdfd;">
                        <div class="card-header" style=" border-radius: 16px 16px 0 0; padding: 15px;">
                            <h3 class="text-center mb-0">Sales By Day</h3>
                        </div>
                        <div class="card-body" style="padding: 20px;">
                            <canvas id="salesChart"></canvas>
                        </div>
                        <div class="card-footer text-center" style="background-color: #f1f1f1; padding: 10px; border-radius: 0 0 16px 16px;">
                            <small class="text-muted">Updated as of {{ now()->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Orders Pie Chart
            var ctxOrders = document.getElementById('ordersChart').getContext('2d');
            var ordersChart = new Chart(ctxOrders, {
                type: 'doughnut', // Changed to Doughnut for better visualization
                data: {
                    labels: @json($days),
                    datasets: [{
                        label: 'Total Orders',
                        data: @json($orderTotal),
                        backgroundColor: [
                            "#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40"
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 10,
                            }
                        }
                    }
                }
            });

            // Sales Bar Chart
            var ctxSales = document.getElementById('salesChart').getContext('2d');
            var salesChart = new Chart(ctxSales, {
                type: 'bar',
                data: {
                    labels: @json($saleday),
                    datasets: [{
                        label: 'Total Sales',
                        data: @json($saletotal),
                        backgroundColor: [
                            "#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40"
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>

<div class="table-responsive">
    <table class="table table-bordered" style=" color: #333;">
        <thead style="background-color: #4a90e2; color: white;">
            <tr>
                <th>Category</th>
                <th>Brand</th>
                <th>Color</th>
                <th>Amount</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Payment</th>
                <th>Order Date</th>
                <th>Order Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr style="transition: background 0.3s;" class="{{ $order->order_status == 'Pending' ? 'table-warning' : 'table-success' }}">
                <td>{{ $order->category }}</td>
                <td>{{ $order->brand }}</td>
                <td>{{ $order->color }}</td>
                <td>${{ $order->qty * $order->price }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->payment }}</td>
                <td>{{ $order->created_at->format('m-d-Y') }}</td>
                <td>
                    <span class="badge badge-{{ $order->order_status == 'Pending' ? 'warning' : 'success' }}" style="font-size: 0.9em;color:#ffc107">
                        <i class="fas {{ $order->order_status == 'Pending' ? 'fa-clock' : 'fa-check-circle' }}"></i>
                        {{ $order->order_status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

  <div class="row">
    <div class="col-12">
        <div class="card shadow-lg" style="border-radius: 16px; border: none; background-color: #ffffff;">
            <div class="card-header" style="background-color: #3494be; color: white; border-radius: 16px 16px 0 0; padding: 15px;">
                <h4 class="card-title text-center mb-0">Registered Customers</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Customers Table Section -->

                    <div class="col-md-5 mt-3">
                        <div class="table-responsive p-3" style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <table class="table align-middle">
                                <thead>
                                    <tr style="background-color: #3494be; color: white; text-transform: uppercase;">
                                        <th class="text-start">Name</th>
                                        <th class="text-start">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="border-bottom" style="background-color: #fdfdfd; transition: background-color 0.2s;">
                                        <td class="py-3">{{ $user->name }}</td>
                                        <td class="py-3">{{ $user->email }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Map Section -->
                    <div class="col-md-7 d-flex align-items-center justify-content-center mt-3">
                        <div class="map-container" style="width: 100%; height: 300px; background: url('/images/map.jpg') no-repeat center center / cover; border-radius: 16px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                            <!-- Placeholder for the map image -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center" style="background-color: #f1f1f1; padding: 10px; border-radius: 0 0 16px 16px;">
                <small class="text-muted">Last updated {{ now()->format('M d, Y') }}</small>
            </div>
        </div>
    </div>
</div>

  <script src="css/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="css/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

  <style>

.ea {
  margin-top: 30px;
}

.card {
  border-radius: 15px;
  transition: all 0.3s ease-in-out;
  border: none;
  background: linear-gradient(135deg, #f7f7f7, #e8e8e8);
}

.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.card h5 {
  color: #333;
}

.card p {
  color: #666;
}

.btn-primary {
  background-color: #6d83f2;
  border-radius: 50px;
}

.btn-success {
  background-color: #28a745;
  border-radius: 50px;
}

.btn-info {
  background-color: #17a2b8;
  border-radius: 50px;
}

.btn-warning {
  background-color: #ffc107;
  border-radius: 50px;
}

.btn-danger {
  background-color: #dc3545;
  border-radius: 50px;
}

.btn-dark {
  background-color: #343a40;
  border-radius: 50px;
}

.card-body {
  text-align: center;
}

.card {
  margin-bottom: 20px;
}

@media (max-width: 770px) {
  .card {
    margin-bottom: 20px;
  }
}

.card-custom {
        height: 200px;
        box-shadow: 0px 9px 12px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.4);
    }

    .card-body i {
        margin-bottom: 15px;
    }

    .card-title {
        font-weight: bold;
        font-size: 1.2em;
    }

    .card {
        border-radius: 12px;
        padding: 20px;
        background-color: #f8f9fa;
    }

    .card h3 {
        font-weight: bold;
        margin-bottom: 20px;
    }

    .card-body {
        padding: 0;
    }

    canvas {
        padding-top: 20px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table th {
        font-weight: bold;
        padding: 12px 15px;
    }

    .table td {
        padding: 12px 15px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.08);
    }

    .table tbody tr:hover {
        background-color: #f1f8ff;
    }

    .map-container {
        position: relative;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    }
  </style>

@endsection
