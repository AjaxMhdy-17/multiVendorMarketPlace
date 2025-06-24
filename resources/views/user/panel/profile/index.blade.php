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
                                                <div class="select-has--icon">
                                                    <select class="common-input border select_2" name="country"
                                                        id="Countryyy">
                                                        <option value="">Select Country</option>
                                                        @forelse (config('options.countries') as $key => $value)
                                                            <option @selected($user->country == $value)
                                                                value="{{ $value }}">{{ $value }}</option>
                                                        @empty
                                                            <option value="">No Country Added</option>
                                                        @endforelse
                                                    </select>
                                                    <x-input-error :messages="$errors->get('country')" class="mt-1" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="cityyy"
                                                    class="form-label mb-2 font-18 font-heading fw-600">City</label>
                                                <div class="select-has--icon">
                                                    <select class="common-input border select_2" name="city"
                                                        id="cityyy">
                                                        <option value="">Select Country</option>
                                                        <option value="dhaka">Dhaka</option>
                                                        <option value="chandpur">Chandpur</option>
                                                        <option value="comilla">Comilla</option>
                                                        <option value="chittagong">Chittagong</option>
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
                                                    value="{{ optional($user)->address }}" name="address" />
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

                                                @if (!empty($user->avatar))
                                                    <div class="mt-2">
                                                        <img id="image_preview" src="{{ asset($user->avatar) }}"
                                                            alt="Uploaded Avatar" class="height__width__200px" />
                                                    </div>
                                                @else
                                                    <div class="mt-2">
                                                        <img id="image_preview" src="#" alt="Image Preview"
                                                            class="d-none height__width__200px" />
                                                    </div>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <button class="btn btn-main btn-lg"> Update
                                                Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-changePassword" role="tabpanel"
                                aria-labelledby="pills-changePassword-tab" tabindex="0">
                                <form action="{{ route('profile.user.store') }}" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form_box">
                                                <label for="current-password"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Current
                                                    Password</label>
                                                <div class="position-relative">
                                                    <input type="password"
                                                        class="common-input common-input--withIcon common-input--withLeftIcon "
                                                        id="current-password" name="current-password" />
                                                    <span class="input-icon input-icon--left"><img
                                                            src="{{ asset('assets/user/images/icons/key-icon.svg') }}"
                                                            alt=""></span>
                                                    <span
                                                        class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two"
                                                        id="#current-password"></span>
                                                </div>
                                                <x-input-error :messages="$errors->get('current-password')" class="mt-1" />
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="password"
                                                    class="form-label mb-2 font-18 font-heading fw-600">New
                                                    Password</label>
                                                <div class="position-relative">
                                                    <input type="password"
                                                        class="common-input common-input--withIcon common-input--withLeftIcon "
                                                        id="password" name="password" />
                                                    <span class="input-icon input-icon--left"><img
                                                            src="{{ asset('assets/user/images/icons/lock-two.svg') }}"
                                                            alt="image"></span>
                                                    <span
                                                        class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two"
                                                        id="#password"></span>
                                                </div>
                                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form_box">
                                                <label for="password_confirmation"
                                                    class="form-label mb-2 font-18 font-heading fw-600">Confirm
                                                    Password</label>
                                                <div class="position-relative">
                                                    <input type="password"
                                                        class="common-input common-input--withIcon common-input--withLeftIcon "
                                                        id="password_confirmation" name="password_confirmation">
                                                    <span class="input-icon input-icon--left"><img
                                                            src="{{ asset('assets/user/images/icons/lock-two.svg') }}"
                                                            alt="image"></span>
                                                    <span
                                                        class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two"
                                                        id="#password_confirmation"></span>
                                                </div>
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
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


@push('css')
    <style>
        .height__width__200px {
            height: 200px;
            width: 200px;
            border-radius: 10px;
            border: 3px solid var(--colorPrimary);
            margin-top: 10px;
        }
    </style>
@endpush


@push('js')
    <script>
        const avatar = document.getElementById('avatar');
        avatar.addEventListener('change', function(event) {
            const [file] = event.target.files;
            const preview = document.getElementById('image_preview');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            } else {
                preview.classList.add('d-none');
            }
        });
    </script>
@endpush
