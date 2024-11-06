@extends('admin.layouts.master')

@section('head-tag')
    <title>پرداخت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">پرداخت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد پرداخت جدید</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="">ایجاد پرداخت جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm" type="text" name="search" id="search"
                            placeholder="جستجو...">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" style="height: 160px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد تراکنش</th>
                                <th>بانک</th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="width-22-rem text-center"><i class="fas fa-cogs"></i> عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payment->paymentable->transaction_id ?? '-' }}</td>
                                    <td>{{ $payment->paymentable->gateway ?? '-' }}</td>

                                    <td>{{ $payment->user->fullname }}</td>
                                    <td>
                                        @if ($payment->status == 0)
                                            پرداخت نشده
                                        @elseif ($payment->status == 1)
                                            پرداخت شده
                                        @elseif ($payment->status == 2)
                                            لغو
                                        @else
                                            برگشت
                                        @endif
                                    </td>
                                    <td>
                                        @if ($payment->type == 0)
                                            آنلاین
                                        @elseif ($payment->type == 1)
                                            آفلاین
                                        @else
                                            در محل
                                        @endif
                                    </td>

                                    <td class="max-width-22-rem text-left">
                                        {{-- <a class="btn btn-sm btn-info" href="{{ route('admin.market.payment.show', $payment->id) }}"><i class="fas fa-eye"></i> مشاهده</a>
                                        <a class="btn btn-sm btn-warning" href="{{ route('admin.market.payment.cancel', $payment->id) }}"><i class="fas fa-window-close"></i> باطل کردن</a>
                                        <a class="btn btn-sm btn-danger" href="{{ route('admin.market.payment.refund', $payment->id) }}"><i class="fas fa-reply"></i> برگرداندن</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
