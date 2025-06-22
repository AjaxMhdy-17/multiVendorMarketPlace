@extends('user.layout.main')

@section('title', 'index')


@section('content')

    <!-- ============================ Sale Offer Start =========================== -->
    @include('user.sections.saleOffer')
    <!-- ============================ Sale Offer End =========================== -->

    <!-- ==================== Header Start Here ==================== -->
    @include('user.layout.header')
    <!-- ==================== Header End Here ==================== -->

    <!-- ==================== Category Menu Start ==================== -->
    @include('user.sections.categoryMenu')
    <!-- ==================== Category Menu End ==================== -->

    <!--========================== Banner Section Start ==========================-->
    @include('user.sections.bannerSection')
    <!--========================== Banner Section End ==========================-->

    <!-- ======================== popular Section Start =========================== -->
    @include('user.sections.popularSection')
    <!-- ======================== popular Section End =========================== -->

    <!-- =========================== Arrival Product Section Start ========================== -->
    @include('user.sections.bannerSection')
    <!-- =========================== Arrival Product Section End ========================== -->

    <!-- ======================= Featured Products Start =============================== -->
    @include('user.sections.featureProductSection')
    <!-- ======================= Featured Products End =============================== -->

    <!-- ======================= Selling Products Start ========================= -->
    @include('user.sections.sellingProductSection')
    <!-- ======================= Selling Products End ========================= -->

    <!-- ======================= To Featured Author Start =============================== -->
    @include('user.sections.featureAuthorSection')
    <!-- ======================= To Featured Author End =============================== -->

    <!-- ======================= Top performance Author Start =============================== -->
    @include('user.sections.performanceAuthorSection')
    <!-- ======================= Top performance Author End =============================== -->

    <!-- ======================= Become seller section start ==================== -->
    @include('user.sections.becomeSellerSection')
    <!-- ======================= Become seller section End ==================== -->
@endsection
