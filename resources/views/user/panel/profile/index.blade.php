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
                                            <x-user.input-text type="text" name='name' label="{{ __('Name') }}"
                                                value="{{ optional($user)->name }}" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <x-user.input-text type="email" name='email' label="{{ __('Email') }}"
                                                value="{{ optional($user)->email }}" readonly />
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <x-user.input-select name="country" :label="__('country')">
                                                @foreach (config('options.countries') as $key => $value)
                                                    <option @selected($user->country == $value) value="{{ $value }}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </x-user.input-select>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <x-user.input-text type="text" name='city' label="{{ __('City') }}"
                                                value="{{ optional($user)->city }}" />
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <x-user.input-text type="text" name='address' label="{{ __('Address') }}"
                                                value="{{ optional($user)->address }}" />
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
                                            <x-user.input-text type="password" name='current-password'
                                                label="{{ __('Current Password') }}" />
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <x-user.input-text type="password" name='password'
                                                label="{{ __('New Password') }}" />

                                        </div>
                                        <div class="col-sm-6 col-xs-6">

                                            <x-user.input-text type="password" name='password_confirmation'
                                                label="{{ __('Confirm Password') }}" />

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
