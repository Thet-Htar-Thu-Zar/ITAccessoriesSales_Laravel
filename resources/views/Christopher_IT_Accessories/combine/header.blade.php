<?php
use App\Http\Controllers\ProductController;
if (ProductController::countItem()>0) {
    $total = ProductController::countItem();
}
 else {
    $total="";
 }
?>
<body>
    <header class="site-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="fa-solid fa-tablet mt-1 me-3"></i>
                         Christopher_IT_Accessories
                    </p>

                    <p class="d-flex d-lg-block d-md-block d-none me-4 mb-0">
                        <i class="fa fa-clock me-2"></i>
                        <strong class="me-2">Mon - Fri</strong> 8:00 AM - 5:30 PM
                    </p>

                    <p class="site-header-icon-wrap  d-flex mb-0 ms-auto">
                        <i class="fa-solid fa-phone mt-1 me-2"></i>

                        +959 256674500
                    </p>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}" >Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product')}}">Products</a>
                    </li>

                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false">
                            Orders
                        </a>
                        <ul class="dropdown-menu" style="position: absolute; top: 100%; left: 0; display: none; background-color: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 4px; min-width: 150px; padding: 10px 0;">
                            <li><a class="dropdown-item" href="{{ route('current') }}" style="padding: 10px 15px; display: block; color: #333; text-decoration: none;">Current Orders</a></li>
                            <li><a class="dropdown-item" href="{{ route('history') }}" style="padding: 10px 15px; display: block; color: #333; text-decoration: none;">Order History</a></li>
                        </ul>
                    </li>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const dropdown = document.querySelector('.dropdown');
                            const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
                            const dropdownMenu = dropdown.querySelector('.dropdown-menu');

                            dropdownToggle.addEventListener('click', function(e) {
                                e.preventDefault();
                                const isDropdownVisible = dropdownMenu.style.display === 'block';
                                dropdownMenu.style.display = isDropdownVisible ? 'none' : 'block';
                            });

                            // Hide the dropdown if clicking outside
                            document.addEventListener('click', function(e) {
                                if (!dropdown.contains(e.target)) {
                                    dropdownMenu.style.display = 'none';
                                }
                            });
                        });
                    </script>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contactus')}}">Contact</a>
                    </li>


                    @if(!session()->has('user'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signin') }}">
                                <i class="fas fa-sign-in-alt"></i> Sign in
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signup') }}">
                                <i class="fas fa-user-plus"></i> Sign up
                            </a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" aria-expanded="false" onclick="toggleDropdown(event)">
                                {{ session()->get('user')->name }}
                            </a>
                            <ul class="dropdown-menu" id="dropdownMenu" aria-labelledby="userDropdown" style="display: none;">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <script>
                        function toggleDropdown(event) {
                            event.preventDefault();
                            const dropdownMenu = document.getElementById('dropdownMenu');
                            const isVisible = dropdownMenu.style.display === 'block';
                            dropdownMenu.style.display = isVisible ? 'none' : 'block';

                            document.addEventListener('click', function(event) {
                                if (!event.target.closest('#userDropdown')) {
                                    dropdownMenu.style.display = 'none';
                                }
                            });
                        }
                        </script>

                </ul>

                <form class="d-flex" action="{{route('search')}}" method="post">
                    @csrf
                  <input class="form-control me-2" type="search" placeholder="IT_accessories...." aria-label="Search" name="search">
                  <button class="btn me-3" type="submit" style="background-color:black;color:white">Search</button>
                </form>

                    <a href="{{route('cart')}}" class="position-relative" style="text-decoration: none; color: black;">
                        <i class="fa-solid fa-cart-shopping me-2" style="font-size: 25px; color: black;"></i>
                        @if($total && $total > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning" style="font-size: smaller; color: #39390b; padding: 5px;">
                                {{$total}}
                            </span>
                        @endif
                    </a>
            </div>
        </div>
    </nav>


</body>
