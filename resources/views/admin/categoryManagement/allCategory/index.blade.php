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
                            <a href="{{ route('admin.category.all.create') }}"
                                class="btn btn-primary">{{ __('+ Add Category') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>icon</th>
                                            <th>file_types</th>
                                            <th>created At</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@include('admin.layout.dataTableLibs')



@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/3.21.0/tabler-icons.min.css"
        integrity="sha512-XrgoTBs7P5YtpkeKqKOKkruURsawIaRrhe8QrcWeMnFeyRZiOcRNjBAX+AQeXOvx9/9fSY32dVct1PccRoCICQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/ez-icon-picker.css') }}" />
@endpush



@push('css')
    <style>
        thead tr th:nth-child(1) .dt-column-order {
            display: none;
        }
        .w__100px {
            background: greenyellow !important;
        }
        .ez_icons i {
            color: #555555;
            font-size: 25px;
        }
    </style>
@endpush


@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush




@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            table = $('.datatable').DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: {
                    url: "{{ route('admin.category.all.index') }}"
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        title: 'No',
                        orderable: false,
                        searchable: false,
                        className: "text-center"
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: "text-center ",
                    },
                    {
                        data: 'icon',
                        name: 'icon',
                        className: "text-center ",
                    },
                    {
                        data: 'file_types',
                        name: 'file_types',
                        className: "text-center",
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: "text-center",
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: "text-end",
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    target: 0,
                    width: "60px"
                }],
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                }
            });

            //single delete 
            $(document).on('click', '.show-alert-delete-box', function(e) {
                e.preventDefault();
                let formId = $(this).data('form-id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to undo this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            });
        });
    </script>
@endpush
