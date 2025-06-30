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
                                <a href="{{ route('admin.roles.permissions.index') }}" class="btn btn-primary"> <- back</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.roles.permissions.update', ['permission' => $roles->id]) }}"
                            method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <x-admin.input-text type="text" title="Role Name" value="{{ $roles->name }}"
                                            name="role_name" />
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($permissions as $groupName => $permissionItem)
                                        <div class="col-md-4">
                                            <h3 class="mt-4">{{ $groupName }}</h3>
                                            @foreach ($permissionItem as $permission)
                                                <label class="form-check">
                                                    <input @checked($roles->hasPermissionTo($permission->name)) class="form-check-input"
                                                        type="checkbox" value="{{ $permission->name }}"
                                                        name="permissions[]" />
                                                    <span class="form-check-label">{{ $permission->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('UPDATE') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
