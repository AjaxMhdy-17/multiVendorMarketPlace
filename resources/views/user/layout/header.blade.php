 <header class="header">
     <div class="container container-full">
         <nav class="header-inner flx-between">
             <!-- Logo Start -->
             @include('user.layout.logo')
             <!-- Logo End  -->

             <!-- Menu Start  -->
             <div class="header-menu d-lg-block d-none">
                 <ul class="nav-menu flx-align ">
                     <li class="nav-menu__item">
                         <a href="javascript:void(0)" class="nav-menu__link">Home</a>
                     </li>
                     <li class="nav-menu__item">
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
                                 <a href="profile.html" class="nav-submenu__link">Test 01</a>
                             </li>
                             <li class="nav-submenu__item">
                                 <a href="profile.html" class="nav-submenu__link">Test 02</a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-menu__item">
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
                     <li class="nav-menu__item">
                         <a href="#" class="nav-menu__link">Start Selling</a>
                     </li>
                 </ul>
             </div>
             <!-- Menu End  -->

             <!-- Header Right start -->
             <div class="header-right flx-align">
                 <a href="cart.html" class="header-right__button cart-btn position-relative">
                     <i class="ti ti-basket"></i>
                     <span class="qty-badge font-12">0</span>
                 </a>

                 <div class="header-right__inner gap-3 flx-align d-lg-flex d-none">
                     <div class="dropdown">
                         <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false">
                             <img src="{{ asset('assets/user/images/icons/user.svg') }}"" alt="">
                         </button>
                         <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                             <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                             <li><a class="dropdown-item" href="#">Profile</a></li>
                             <li><a class="dropdown-item" href="#">Settings</a></li>
                             <li>
                                 <a href="#"
                                     onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                                     class="dropdown-item">Logout</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="post" class="hidden">
                                     @csrf
                                 </form>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <button type="button" class="toggle-mobileMenu d-lg-none"> <i class="las la-bars"></i>
                 </button>
             </div>
             <!-- Header Right End  -->
         </nav>
     </div>
 </header>
