@extends('user.dashboardLayout.main')

@section('title', 'dashboard')

@section('content')

    <div class="dashboard-body__item">
        <div class="row gy-4">
            <div class="col-xl-3 col-sm-6">
                <div class="dashboard-widget green">
                    <span class="dashboard-widget__icon">
                        <i class="ti ti-list-details"></i>
                    </span>
                    <div class="dashboard-widget__content flx-between gap-1 align-items-end">
                        <div>
                            <h4 class="dashboard-widget__number mb-1 mt-3">2M+</h4>
                            <span class="dashboard-widget__text font-14">Total Products</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="dashboard-widget orange">
                    <span class="dashboard-widget__icon">
                        <i class="ti ti-currency-dollar"></i>
                    </span>
                    <div class="dashboard-widget__content flx-between gap-1 align-items-end">
                        <div>
                            <h4 class="dashboard-widget__number mb-1 mt-3">$5289.00</h4>
                            <span class="dashboard-widget__text font-14">Total Earnings</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="dashboard-widget blue">
                    <span class="dashboard-widget__icon">
                        <i class="ti ti-download"></i>
                    </span>
                    <div class="dashboard-widget__content flx-between gap-1 align-items-end">
                        <div>
                            <h4 class="dashboard-widget__number mb-1 mt-3">5,2458</h4>
                            <span class="dashboard-widget__text font-14">Total Downloads</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="dashboard-widget red">
                    <span class="dashboard-widget__icon">
                        <i class="ti ti-basket-check"></i>
                    </span>
                    <div class="dashboard-widget__content flx-between gap-1 align-items-end">
                        <div>
                            <h4 class="dashboard-widget__number mb-1 mt-3">2,589</h4>
                            <span class="dashboard-widget__text font-14">Total Sales</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
