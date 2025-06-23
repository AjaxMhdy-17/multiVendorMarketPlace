@extends('user.dashboardLayout.main')

@section('title', 'profile')

@section('content')

    <div class="profile">
        <div class="row gy-4">
            <div class="col-xxl-3 col-xl-4">
                @include('user.panel.profile.profileCard')
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
                                <form action="{{ route('profile.user.update', ['user' => $user->id]) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="name"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Full
                                                    Name</label>
                                                <input type="text" class="common-input border" id="name"
                                                    value="{{ optional($user)->name }}" name="name" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="email"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Email
                                                </label>
                                                <input type="email" name="email" class="common-input border"
                                                    id="email" value="{{ optional($user)->email }}" readonly>
                                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="Countryyy"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Country</label>
                                                <div class="select-has-icon">
                                                    <select class="common-input border" name="country" id="Countryyy">
                                                        <option value="1">USA</option>
                                                        <option value="1">Bangladesh</option>
                                                        <option value="1">Europe</option>
                                                        <option value="1">Africa</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('country')" class="mt-1" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="cityyy"
                                                    class="form-label mb-2 font-18 font-heading fw-600">City</label>
                                                <div class="select-has-icon">
                                                    <select class="common-input border" name="city" id="cityyy">
                                                        <option value="1">Dhaka</option>
                                                        <option value="1">Chandpur</option>
                                                        <option value="1">Comilla</option>
                                                        <option value="1">Chittagong</option>
                                                    </select>
                                                </div>
                                                <x-input-error :messages="$errors->get('city')" class="mt-1" />
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="address"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Address
                                                </label>
                                                <input type="text" class="common-input border" id="address"
                                                    value="{{ old('address') }}" />
                                                <x-input-error :messages="$errors->get('address')" class="mt-1" />
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="avatar"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Avatar</label>
                                                <input type="file" class="common-input border" name="avatar"
                                                    id="avatar" value="{{ old('avatar') }}" />
                                                <x-input-error :messages="$errors->get('avatar')" class="mt-1" />
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
