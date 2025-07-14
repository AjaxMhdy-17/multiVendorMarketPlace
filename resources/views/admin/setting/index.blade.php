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
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-md-3 border-end">
                        <div class="card-body">
                            <h4 class="subheader">Business settings</h4>
                            <div class="list-group list-group-transparent">
                                <a href="./settings.html"
                                    class="list-group-item list-group-item-action d-flex align-items-center active">My
                                    Account</a>
                                <a href="#"
                                    class="list-group-item list-group-item-action d-flex align-items-center">My
                                    Notifications</a>
                                <a href="#"
                                    class="list-group-item list-group-item-action d-flex align-items-center">Connected
                                    Apps</a>
                                <a href="./settings-plan.html"
                                    class="list-group-item list-group-item-action d-flex align-items-center">Plans</a>
                                <a href="#"
                                    class="list-group-item list-group-item-action d-flex align-items-center">Billing &amp;
                                    Invoices</a>
                            </div>
                            <h4 class="subheader mt-4">Experience</h4>
                            <div class="list-group list-group-transparent">
                                <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">{{ __('General Setting') }}</h2>
                            <form id="form" action="{{ route('admin.setting.update', ['setting' => 88]) }}"
                                method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-admin.input-text type="text" name="site_name" label="Site Name"
                                            :value="config('setting.site_name')" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-admin.input-text type="email" name="site_email" label="Site Email"
                                            :value="config('setting.site_email')" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer bg-transparent mt-auto">
                            <div class="btn-list justify-content-end">
                                <button type="button" onclick="$('#form').submit();" class="btn btn-primary btn-2">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
