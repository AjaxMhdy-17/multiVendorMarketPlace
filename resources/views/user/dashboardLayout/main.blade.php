<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @include('user.layout.cssLibs')
    @include('user.layout.cssStyle')

    <style>
        .active {
            color: var(--colorSuccess);
        }
    </style>

    @stack('css')

</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->

    <!-- ==================== Mobile Menu Start Here ==================== -->
    <div class="mobile-menu d-lg-none d-block">
        <button type="button" class="close-button"> <i class="las la-times"></i> </button>
        <div class="mobile-menu__inner">
            <a href="index.html" class="mobile-menu__logo">
                <img src="{{ asset('assets/user/images/logo/logo-two.png') }}" alt="Logo" class="white-version">
            </a>
            <div class="mobile-menu__menu">
                <div class="header-right__inner d-lg-none my-3 gap-1 d-flex flx-align">
                    <a href="cart.html" class="header-right__button cart-btn position-relative">
                        <i class="ti ti-basket"></i>
                        <span class="qty-badge font-12">0</span>
                    </a>

                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('assets/user/images/icons/user.svg') }}" alt="">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sign Up</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav-menu flx-align nav-menu--mobile">
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Home</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="index.html" class="nav-submenu__link"> Home One</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="index-two.html" class="nav-submenu__link"> Home Two</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="index-three.html" class="nav-submenu__link"> Home Three</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Products</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="all-product.html" class="nav-submenu__link"> All Products</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="product-details.html" class="nav-submenu__link"> Product Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Pages</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="profile.html" class="nav-submenu__link"> Profile</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="cart.html" class="nav-submenu__link"> Shopping Cart</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="cart-personal.html" class="nav-submenu__link"> Mailing Address</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="cart-payment.html" class="nav-submenu__link"> Payment Method</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="cart-thank-you.html" class="nav-submenu__link"> Preview Order</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="dashboard.html" class="nav-submenu__link"> Dashboard</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Blog</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="blog.html" class="nav-submenu__link"> Blog</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details.html" class="nav-submenu__link"> Blog Details</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details-sidebar.html" class="nav-submenu__link"> Blog Details
                                    Sidebar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item">
                        <a href="contact.html" class="nav-menu__link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ==================== Mobile Menu End Here ==================== -->

    <!-- ================================== Dashboard Start =========================== -->
    <section class="dashboard">
        <div class="dashboard__inner d-flex">

            <!-- ===================== Dashboard Sidebar Start ======================= -->
            @include('user.dashboardLayout.sidebar')
            <!-- ===================== Dashboard Sidebar End ======================= -->

            <div class="dashboard-body">

                <!-- Dashboard Nav Start -->
                @include('user.dashboardLayout.header')
                <!-- Dashboard Nav End -->


                <div class="dashboard-body__content">

                    <!-- welcome balance Content Start -->
                    
                    <!-- welcome balance Content End -->

                    <div class="dashboard-body__item-wrapper">

                        <!-- dashboard body Item Start -->
                        @yield('content')
                        <!-- dashboard body Item End -->



                    </div>
                </div>

                <!-- ====================== Dashboard Footer Start ======================== -->
                @include('user.dashboardLayout.footer')
                <!-- ====================== Dashboard Footer End ======================== -->


            </div>
        </div>
    </section>
    <!-- ================================== Dashboard End =========================== -->

    @include('user.layout.jsLibs')
    @include('user.layout.jsScripts')

    @stack('js')

</body>

</html>
