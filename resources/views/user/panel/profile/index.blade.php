@extends('user.dashboardLayout.main')

@section('title', 'profile')

@section('content')

    <div class="profile">
        <div class="row gy-4">
            <div class="col-xxl-3 col-xl-4">
                <div class="profile-info">
                    <div class="profile-info__inner mb-40 text-center">

                        <div class="avatar-upload mb-24">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview">
                                </div>
                            </div>
                        </div>

                        <h5 class="profile-info__name mb-1">Michel Smith</h5>
                        <span class="profile-info__designation font-14">Exclusive Author</span>
                    </div>

                    <ul class="profile-info-list">
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-user"></i>
                                <span class="text text-heading fw-500">Username</span>
                            </span>
                            <span class="profile-info-list__info">michel15</span>
                        </li>
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-mail-forward"></i>
                                <span class="text text-heading fw-500">Email</span>
                            </span>
                            <span class="profile-info-list__info">michel15@gmail.com</span>
                        </li>
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-phone-plus"></i>
                                <span class="text text-heading fw-500">Phone</span>
                            </span>
                            <span class="profile-info-list__info">+880 15589 236 45</span>
                        </li>
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-map-pin"></i>
                                <span class="text text-heading fw-500">Country</span>
                            </span>
                            <span class="profile-info-list__info">Bangladesh</span>
                        </li>
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-currency-dollar"></i>
                                <span class="text text-heading fw-500">Balance</span>
                            </span>
                            <span class="profile-info-list__info">$0.00 USD</span>
                        </li>
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-calendar-month"></i>
                                <span class="text text-heading fw-500">Member Since</span>
                            </span>
                            <span class="profile-info-list__info">Jan, 01, 2024</span>
                        </li>
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-basket-check"></i>
                                <span class="text text-heading fw-500">Purchased</span>
                            </span>
                            <span class="profile-info-list__info">0 items</span>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-xxl-9 col-xl-8">
                <div class="dashboard-card">
                    <div class="dashboard-card__header pb-0">
                        <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-18 font-heading active" id="pills-personalInfo-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-personalInfo" type="button" role="tab"
                                    aria-controls="pills-personalInfo" aria-selected="true">Personal
                                    Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-18 font-heading" id="pills-payouts-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-payouts" type="button" role="tab"
                                    aria-controls="pills-payouts" aria-selected="false">Payouts</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-18 font-heading" id="pills-changePassword-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-changePassword" type="button"
                                    role="tab" aria-controls="pills-changePassword" aria-selected="false">Change
                                    Password</button>
                            </li>
                        </ul>
                    </div>

                    <div class="profile-info-content">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-personalInfo" role="tabpanel"
                                aria-labelledby="pills-personalInfo-tab" tabindex="0">
                                <form action="#" autocomplete="off">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="fName"
                                                    class="form-label mb-2 font-18 font-heading fw-600">First
                                                    Name</label>
                                                <input type="text" class="common-input border" id="fName"
                                                    value="Michel" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="lastNamee"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Last
                                                    Name</label>
                                                <input type="text" class="common-input border" id="lastNamee"
                                                    value="Smith" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="phonee"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Phone
                                                    Number</label>
                                                <input type="tel" class="common-input border" id="phonee"
                                                    value="+880 15589 236 45" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="emailAdddd"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Email
                                                    Address</label>
                                                <input type="email" class="common-input border" id="emailAdddd"
                                                    value="michel15@gmail.com" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="cityyy"
                                                    class="form-label mb-2 font-18 font-heading fw-600">City</label>
                                                <div class="select-has-icon">
                                                    <select class="common-input border" id="cityyy">
                                                        <option value="1">Dhaka</option>
                                                        <option value="1">Chandpur</option>
                                                        <option value="1">Comilla</option>
                                                        <option value="1">Rangpur</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box"> <label for="Stateee"
                                                    class="form-label mb-2 font-18 font-heading fw-600">State/Region</label>
                                                <div class="select-has-icon">
                                                    <select class="common-input border" id="Stateee">
                                                        <option value="1">USA</option>
                                                        <option value="1">Bangladesh</option>
                                                        <option value="1">India</option>
                                                        <option value="1">Pakistan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="Postcodeee"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Postcode</label>
                                                <input type="text" class="common-input border" id="Postcodeee"
                                                    value="1219" placeholder="Post Code">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="Countryyy"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Country</label>
                                                <div class="select-has-icon">
                                                    <select class="common-input border" id="Countryyy">
                                                        <option value="1">USA</option>
                                                        <option value="1">Bangladesh</option>
                                                        <option value="1">India</option>
                                                        <option value="1">Pakistan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <button class="btn btn-main btn-lg"> Update
                                                Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-payouts" role="tabpanel"
                                aria-labelledby="pills-payouts-tab" tabindex="0">
                                <form action="#" autocomplete="off">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="name"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Full
                                                    Name</label>
                                                <input type="text" class="common-input border" id="name"
                                                    value="Michel" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="phone"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Phone
                                                    Number</label>
                                                <input type="tel" class="common-input border" id="phone"
                                                    value="+880 15589 236 45" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="emailAdd"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Email
                                                    Address</label>
                                                <input type="email" class="common-input border" id="emailAdd"
                                                    value="michel15@gmail.com" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="city"
                                                    class="form-label mb-2 font-18 font-heading fw-600">City</label>
                                                <div class="select-has-icon">
                                                    <select class="common-input border" id="city">
                                                        <option value="1">Dhaka</option>
                                                        <option value="1">Chandpur</option>
                                                        <option value="1">Comilla</option>
                                                        <option value="1">Rangpur</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn btn-main btn-lg"> Pay Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-changePassword" role="tabpanel"
                                aria-labelledby="pills-changePassword-tab" tabindex="0">
                                <form action="#" autocomplete="off">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form_box">
                                                <label for="current-password"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Current
                                                    Password</label>
                                                <div class="position-relative">
                                                    <input type="password"
                                                        class="common-input common-input--withIcon common-input--withLeftIcon "
                                                        id="current-password" placeholder="************">
                                                    <span class="input-icon input-icon--left"><img
                                                            src="assets/images/icons/key-icon.svg" alt=""></span>
                                                    <span
                                                        class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two"
                                                        id="#current-password"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="new-password"
                                                    class="form-label mb-2 font-18 font-heading fw-600">New
                                                    Password</label>
                                                <div class="position-relative">
                                                    <input type="password"
                                                        class="common-input common-input--withIcon common-input--withLeftIcon "
                                                        id="new-password" placeholder="************">
                                                    <span class="input-icon input-icon--left"><img
                                                            src="assets/images/icons/lock-two.svg" alt=""></span>
                                                    <span
                                                        class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two"
                                                        id="#new-password"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="confirm-password"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Current
                                                    Password</label>
                                                <div class="position-relative">
                                                    <input type="password"
                                                        class="common-input common-input--withIcon common-input--withLeftIcon "
                                                        id="confirm-password" placeholder="************">
                                                    <span class="input-icon input-icon--left"><img
                                                            src="assets/images/icons/lock-two.svg" alt=""></span>
                                                    <span
                                                        class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two"
                                                        id="#confirm-password"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <button class="btn btn-main btn-lg"> Update
                                                Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
