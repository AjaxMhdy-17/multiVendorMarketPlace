@extends('admin.layout.main')

@section('title', $title)

@section('content')

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Combo layout
                    </h2>
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
                            <h3 class="card-title">Invoices</h3>
                            <div>
                                <a href="#" class="btn btn-primary">+ Add New</a>
                            </div>
                        </div>
                        <div class="table-responsive h__100">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Role</th>
                                        <th class="w-1 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar avatar-2 me-2"
                                                    style="background-image: url(./static/avatars/010m.jpg)"> </span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">Thatcher Keel</div>
                                                    <div class="text-secondary"><a href="#"
                                                            class="text-reset">tkeelf@blogger.com</a></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Title">
                                            <div>VP Sales</div>
                                            <div class="text-secondary">Business Development</div>
                                        </td>
                                        <td class="text-secondary" data-label="Role">User</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 6l16 0" />
                                                            <path d="M4 12l16 0" />
                                                            <path d="M4 18l16 0" />
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#"> Another action </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar avatar-2 me-2"
                                                    style="background-image: url(./static/avatars/010m.jpg)"> </span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">Thatcher Keel</div>
                                                    <div class="text-secondary"><a href="#"
                                                            class="text-reset">tkeelf@blogger.com</a></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Title">
                                            <div>VP Sales</div>
                                            <div class="text-secondary">Business Development</div>
                                        </td>
                                        <td class="text-secondary" data-label="Role">User</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 6l16 0" />
                                                            <path d="M4 12l16 0" />
                                                            <path d="M4 18l16 0" />
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#"> Another action </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
