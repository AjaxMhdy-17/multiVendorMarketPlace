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
                        <form action="{{ route('admin.kyc.submission.update', ['submission' => $kyc->id]) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="h4">User Details</p>
                                        <address>
                                            {{ $kyc->user->name }}<br>
                                            {{ $kyc->user->email }}<br>
                                        </address>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="h4">Document Type</p>
                                        <p>{{ $kyc->document_type }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="h4">Document Number</p>
                                        <p>{{ $kyc->document_number }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="h4">Document Status</p>
                                        <p class="badge badge-outline text-teal">{{ $kyc->status }}</p>
                                    </div>

                                    <div class="col-12">
                                        <p class="h4">Document Photo</p>
                                        <div class="d-flex gap-3">
                                            @foreach ($photos as $photo)
                                                <div class="w__160__h__120">
                                                    <img src="{{ asset($photo) }}" class="img-fluid" alt="document-image" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    @if ($kyc->reject_reason != null)
                                        <div class="col-12">
                                            <p class="h4">Document Reject Reason</p>
                                            <p>{{ $kyc->reject_reason }}</p>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" @disabled($kyc->status == 'approved') name="approve"
                                    class="btn btn-primary">{{ __('Approve') }}</button>
                                <button type="submit" @disabled($kyc->status == 'rejected') name="reject"
                                    class="btn btn-primary">{{ __('Reject') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .w__160__h__120 {
            width: 180px;
        }
    </style>
@endpush
