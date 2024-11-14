@extends('admin.layouts.master')

@section('head-tag')
    <title>سفارشات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">سفارشات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد سفارش جدید</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm disabled" href="{{ route('admin.market.brand.create') }}">ایجادسفارش جدید
                    </a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm" type="text" name="" id=""
                            placeholder="جستجو...">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" style="height: 160px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کدسفارش</th>
                                <th>مجموع مبلغ سفارش بدون تخفیف</th>
                                <th>مجموع تمامی مبالغ تخفیفات</th>
                                <th>مبلغ تخفیف همه محصولات</th>
                                <th>مبلغ نهایی</th>
                                <th>وضعیت پرداخت</th>
                                <th>شیوه پرداخت</th>
                                <th>بانک</th>
                                <th>وضعیت ارسال</th>
                                <th>شیوه ارسال</th>
                                <th>وضعیت سفارش</th>
                                <th class="width-8-rem text-center"><i class="fas fa-cogs"></i>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_final_amount }}</td>
                                    <td>{{ $order->order_discount_amount }}</td>
                                    <td>{{ $order->order_total_products_discount_amount }}</td>
                                    <td>{{ $order->order_final_amount - $order->order_discount_amount }}</td>
                                    <td>
                                        @if ($order->payment_status == 0)
                                            پرداخت نشده
                                        @elseif ($order->payment_status == 1)
                                            پرداخت شده
                                        @elseif($order->payment_status == 2)
                                            باطل
                                        @else
                                            برگشت داده شده
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->payment_type == 0)
                                            آنلاین
                                        @elseif ($order->payment_type == 1)
                                            آفلاین
                                        @else
                                            در محل
                                        @endif
                                    </td>
                                    <td>{{ $order->payment->paymentable->gateway ?? '-' }}</td>
                                    <td>
                                        @if ($order->delivery_status == 0)
                                            ارسال نشده
                                        @elseif ($order->delivery_status == 1)
                                            درحال ارسال
                                        @elseif($order->delivery_status == 2)
                                            ارسال شده
                                        @else
                                            تحویل شده
                                        @endif
                                    </td>
                                    <td>{{ $order->delivery->name }}</td>
                                    <td>
                                        @if ($order->order_status == 1)
                                            در انتظارتایید
                                        @elseif ($order->order_status == 2)
                                            تایید نشده
                                        @elseif ($order->order_status == 3)
                                            تایید شده
                                        @elseif ($order->order_status == 4)
                                            باطل شده
                                        @elseif ($order->order_status == 5)
                                            برگشتی
                                        @else
                                            بررسی نشده
                                        @endif
                                    </td>
                                    <td class="max-width-8-rem text-left">
                                        <div class="dropdown">
                                            <a id="dropdownMenuLink" data-toggle="dropdown"
                                                class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                                href="" aria-expanded="false"><i class="fas fa-tools"></i>عملیات</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item text-right" href=""><i
                                                        class="fas fa-images"></i>مشاهده فاکتور</a>
                                                <a class="dropdown-item text-right"
                                                    href="{{ route('admin.market.send.changeSendStatus', $order->id) }}"><i
                                                        class="fas fa-list-ul"></i>تغیروضعیت ارسال</a>
                                                <a class="dropdown-item text-right"
                                                    href="{{ route('admin.market.order.changeOrderStatus', $order->id) }}"><i
                                                        class="fas fa-edit"></i>تغیروضعیت سفارش</a>
                                                <a class="dropdown-item text-right"
                                                    href="{{ route('admin.market.order.cancelOrder', $order->id) }}"><i
                                                        class="fas fa-window-close"></i>باطل کردن سفارش</a>
                                            </div>
                                        </div>
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
