@extends('admin.layout.main')

@section('title', $title)

@section('content')

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <x-admin.page-title title="{{ $title }}" />
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
                            <h3 class="card-title">{{ $title }}</h3>
                            <div>
                                <a href="{{ route('admin.roles.permissions.create') }}" class="btn btn-primary">+ Add
                                    New</a>
                            </div>
                        </div>
                        <div class="table-responsive h__100">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th class="text-center">Permissions</th>
                                        <th class="w-1 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">
                                                    {{ $role->name }}
                                                </div>
                                            </td>
                                            <td data-label="Title" class="text-center">
                                                {{ $role->permissions_count }}
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrows-random">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M20 21h-4v-4" />
                                                                <path d="M16 21l5 -5" />
                                                                <path d="M6.5 9.504l-3.5 -2l2 -3.504" />
                                                                <path d="M3 7.504l6.83 -1.87" />
                                                                <path d="M4 16l4 -1l1 4" />
                                                                <path d="M8 15l-3.5 6" />
                                                                <path d="M21 5l-.5 4l-4 -.5" />
                                                                <path d="M20.5 9l-4.5 -5.5" />
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.roles.permissions.edit', ['permission' => $role->id]) }}">
                                                                Edit </a>

                                                            <a href="#" class="dropdown-item show-alert-delete-box"
                                                                data-form-id="delete-form-{{ $role->id }}">
                                                                Delete
                                                            </a>

                                                            <form id="delete-form-{{ $role->id }}"
                                                                class="delete-form d-none" method="POST"
                                                                action="{{ route('admin.roles.permissions.destroy', ['permission' => $role->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.show-alert-delete-box', function(event) {
                event.preventDefault();
                var formId = $(this).data('form-id');
                var form = $('#' + formId);
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you really want to delete this item?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
