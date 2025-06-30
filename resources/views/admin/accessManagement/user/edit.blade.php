@extends('admin.layout.main')

@section('title', $title)

@section('content')

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <x-admin.page-title title="{{ __($title) }}" />
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn">
                                New view
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __($title) }}</h3>
                            <div>
                                <a href="{{ route('admin.roles.user.index') }}" class="btn btn-primary"> <- back</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.roles.user.update', ['user' => $user_info->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6 col-md-8 col-12">
                                        <x-admin.input-text type="text" :value="$user_info->name" label="{{ __('User Name') }}"
                                            name="name" />
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-12">
                                        <x-admin.input-text type="email" :value="$user_info->email" readonly
                                            label=" {{ __('User Email') }}" name="email" />
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-12">
                                        <x-admin.input-text type="password" label="{{ __('User Password') }}"
                                            name="password" />
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-12">
                                        <x-admin.input-text type="password" label="{{ __('Confirm Password') }}"
                                            name="password_confirmation" />
                                    </div>
                                    <div class="col-12">
                                        <x-admin.input-select name="role" label="{{ __('User Permission') }}">
                                            @foreach ($roles as $role)
                                                <option @selected(in_array($role->
                                                    name,$user_info->getRoleNames()->toArray()))
                                                    value="{{ $role->name }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </x-admin.input-select>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('CREATE') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
