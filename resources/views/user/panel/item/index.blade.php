@extends('user.dashboardLayout.main')

@section('title', 'profile')

@section('content')
    <div class="wsus__dash_order_table">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5>Orders</h5>
                <p>Manage your items.</p>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    {{ __('Add Item') }}
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="sn">
                            serial
                        </th>
                        <th class="details">
                            details
                        </th>
                        <th class="p_date">
                            Purchase Date
                        </th>
                        <th class="e_date">
                            Expired Date
                        </th>
                        <th class="price">
                            Price
                        </th>
                        <th class="action">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="sn">
                            <p>1</p>
                        </td>
                        <td class="details">
                            <a class="title" href="#">Complete Blender Creator Learn 3D Modelling.</a>
                        </td>
                        <td class="p_date">
                            <p>2021-12-28</p>
                        </td>
                        <td class="e_date">
                            <p>2021-12-28</p>
                        </td>
                        <td class="price">
                            <p>$300</p>
                        </td>
                        <td class="action">
                            <a class="view" href="#"><i class="ti ti-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="sn">
                            <p>2</p>
                        </td>
                        <td class="details">
                            <a class="title" href="#">Complete Blender Creator Learn 3D Modelling.</a>
                        </td>
                        <td class="p_date">
                            <p>2021-12-28</p>
                        </td>
                        <td class="e_date">
                            <p>2021-12-28</p>
                        </td>
                        <td class="price">
                            <p>$300</p>
                        </td>
                        <td class="action">
                            <a class="view" href="#"><i class="ti ti-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="sn">
                            <p>3</p>
                        </td>
                        <td class="details">
                            <a class="title" href="#">Complete Blender Creator Learn 3D Modelling.</a>
                        </td>
                        <td class="p_date">
                            <p>2021-12-28</p>
                        </td>
                        <td class="e_date">
                            <p>2021-12-28</p>
                        </td>
                        <td class="price">
                            <p>$300</p>
                        </td>
                        <td class="action">
                            <a class="view" href="#"><i class="ti ti-eye"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="{{ route('author.category.store') }}" method="get" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Select Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-user.input-select name="category" :label="__('Select Category')">
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                        <x-input-error :messages="$errors->get('category')" class="mt-1" />
                    </x-user.input-select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
@endsection
