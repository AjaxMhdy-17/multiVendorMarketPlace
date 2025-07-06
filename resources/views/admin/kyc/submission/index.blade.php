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
                            <button id="delete-selected" class="btn btn-danger d-none">{{ __('Delete Selected') }}</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>photo</th>
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
    <style>
        thead tr th:nth-child(1) .dt-column-order,
        thead tr th:nth-child(2) .dt-column-order {
            display: none;
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
                    url: "{{ route('admin.kyc.submission.index') }}"
                },
                columns: [{
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        title: 'No',
                        orderable: false,
                        searchable: false,
                        className: "text-center"
                    }, {
                        data: 'name',
                        name: 'name',
                        className: "text-center ",
                    },
                    {
                        data: 'email',
                        name: 'email',
                        className: "text-center",
                    },
                    {
                        data: 'photo',
                        name: 'photo',
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
                drawCallback: function() {
                    toggleDeleteButton();
                }
            });


            // CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                }
            });


            function toggleDeleteButton() {
                let selected = $('.row-checkbox:checked').length;
                if (selected > 0) {
                    $('#delete-selected').removeClass('d-none');
                } else {
                    $('#delete-selected').addClass('d-none');
                }
            }

            $(document).on('change', '#select-all', function() {
                $('.row-checkbox').prop('checked', this.checked);
                toggleDeleteButton();
            });


            $(document).on('change', '.row-checkbox', function() {
                let allChecked = $('.row-checkbox').length === $('.row-checkbox:checked').length;
                $('#select-all').prop('checked', allChecked);
                toggleDeleteButton();
            });

            $('#delete-selected').on('click', function() {
                const ids = $('.row-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                if (ids.length === 0) return;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete selected!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.kyc.submission.bulk-delete') }}",
                            type: "POST",
                            data: {
                                ids: ids
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.message, 'success');
                                table.ajax.reload(null, false);
                                $('#select-all').prop('checked', false);
                                toggleDeleteButton();
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', 'Something went wrong.', 'error');
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });



            });

        });
    </script>
@endpush
