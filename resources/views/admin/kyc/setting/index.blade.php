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
                        </div>
                        <form action="{{ route('admin.kyc.setting.store') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <x-admin.input-toggle name="nid_verification"
                                                checked="{{ $kycSetting?->nid_verification ?? false }}"
                                                label="Nid Verification" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <x-admin.input-toggle name="passport_verification" label="Passport Verification"
                                                checked="{{ $kycSetting?->passport_verification ?? false }}" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <x-admin.input-textarea name="instructions" label="Instructions"
                                            :value="$kycSetting?->instructions" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-admin.input-select name="auto_approve" label="{{ __('Auto Approve') }}">
                                            <option @selected($kycSetting?->auto_approve == 0) value="0">Disable</option>
                                            <option @selected($kycSetting?->auto_approve == 1) value="1">Enable</option>
                                        </x-admin.input-select>
                                    </div>

                                    <div class="col-md-6">
                                        <x-admin.input-select name="status" label="{{ __('Kyc Status') }}">
                                            <option @selected($kycSetting?->status == 1) value="1">Active</option>
                                            <option @selected($kycSetting?->status == 0) value="0">Inactive</option>
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
