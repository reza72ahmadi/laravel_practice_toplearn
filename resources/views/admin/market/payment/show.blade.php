@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش پرداخت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> پرداخت</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش پرداخت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش پرداخت
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.payment.index') }}">بازگشت</a>
                </section>

                <section class="card">
                    <section class="card-header text-white bg-custom-yellow">
                        {{ $payment->user->full_name }} </section>
                    <section class="card-body">
                        <h6 class="card-title"> مبلغ: {{ $payment->paymentable->amount ?? '-' }}</h6>
                        <h6 class="card-title"> بانک: {{ $payment->paymentable->gateway ?? '-' }}</h6>
                        <h6 class="card-title"> دریافت کننده: {{ $payment->paymentable->cash_receiver ?? '-' }}</h6>
                        <h6 class="card-title"> تاریخ:
                            {{ jalaliDate($payment->paymentable->pay_date, 'H:i:s - Y/m/d') ?? '-' }}</h6>
                    </section>
                </section>
                <section>
                </section>
            </section>
        </section>
    </section>
@endsection
@section('script')
@endsection
