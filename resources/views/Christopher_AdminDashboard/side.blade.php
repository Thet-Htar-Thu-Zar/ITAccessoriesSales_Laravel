<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Nav</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

<head>
    <style>
        .bu-bg {
            background-color: #7cb8eb;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background: linear-gradient(135deg, #7cb8eb, #00aaff);
            transition: all 0.3s;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow-x: hidden;
            z-index: 1000;
            color: #fff;
        }

        .sidebar ul.components {
            border-bottom: 1px solid #fff;
        }

        .sidebar ul p {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            color: #fff;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            padding: 10px 15px;
            font-size: 0.95em;
            display: flex;
            align-items: center;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: rgba(235, 77, 19, 0.2);
            color: rgb(235, 77, 19);
        }

        .sidebar-header {
            padding: 20px;
            color: #fff;
            text-align: center;
            font-size: 1.3em;
            font-weight: bold;
        }

        .sidebar-header img {
            border-radius: 50%;
            width: 60px;
            margin-bottom: 10px;
        }

        .content {
            padding: 20px;
            margin-left: 250px;
            transition: margin-left 0.3s;
            background-color: #f8f9fa;
        }

        .ea {
            margin-top: 30px;
        }

        .h-b {
            display: none;
        }

        .bg-hover:hover {
            color: #ef7e56;
        }

        .bg-u-a:hover {
            color: #ed7347;
        }

        @media (max-width: 770px) {
            .sidebar {
                display: none;
            }

            .sidebar.active {
                display: block;
                width: 250px;
            }

            .content {
                margin-left: 0;
            }

            .h-b {
                display: inline-block;
            }

            .bu-hide {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="container-fluid ea">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="sidebar-header">
                    <img src="/images/bubbles.png" alt="User Image">
                    <h3>{{auth('admin')->user()->name}}</h3>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <button class="btn text-light border-light bg-hover d-md-none bu-bg h-b" id="sidebarHide">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}"><i class="fas fa-chart-bar"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="{{route('adminProduct')}}"><i class="fas fa-briefcase"></i> Product</a>
                    </li>
                    <li>
                        <a href="{{route('newProduct')}}"><i class="fas fa-plus-circle"></i> New Product</a>
                    </li>
                    <li>
                        <a href="{{route('adminSales')}}"><i class="fas fa-book"></i> Sales</a>
                    </li>
                    <li>
                        <a href="{{route('adminOrder')}}"><i class="fas fa-box"></i> Orders</a>
                    </li>
                    <li>
                        <a href="{{route('admin.message')}}"><i class="fas fa-envelope"></i> Contact</a>
                    </li>

                    <li >
                        <a href="{{route('admin.profile')}}"><i class="fas fa-user"></i> Profile</a>
                    </li>
                    <li >
                        <a  href="{{route('admin.logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>

                </ul>
            </nav>


            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 content">
                <button class="btn text-light b-u-h d-md-none mt-3 btn-dark bg-u-a" id="sidebarCollapse">
                    <i class="fas fa-bars"></i>
                </button>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initial check on page load
            if ($("#sidebar").hasClass("active")) {
                $("#sidebarCollapse").hide();
                $("#sidebarHide").show();
            } else {
                $("#sidebarCollapse").show();
                $("#sidebarHide").hide();
            }

            // Toggle sidebar visibility when first button is clicked
            $("#sidebarCollapse").on("click", function () {
                $("#sidebar").addClass("active").fadeIn(300);
                $(this).fadeOut(300);
                $("#sidebarHide").fadeIn(300);
            });

            // Toggle sidebar visibility when second button is clicked
            $("#sidebarHide").on("click", function () {
                $("#sidebar").removeClass("active").fadeOut(300);
                $(this).fadeOut(300);
                $("#sidebarCollapse").fadeIn(300);
            });
        });
    </script>

  </body>
</html>
