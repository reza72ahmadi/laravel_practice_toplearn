@extends('admin.layouts.master')

@section('head-tag')
    <title>فاکتور</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">فاکتور</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>فاکتور</h5>
                </section>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="width-8-rem text-center"><i class="fas fa-cogs"></i>عملیات</th>
                        </tr>
                    </thead>

                    <tr class="table-primary">
                        <th>{{ $order->id }}</th>
                        <td class="width-16-rem text-left">
                            <a id="print" class="btn btn-sm btn-dark text-white"><i class="fa fa-print"></i> چاپ
                            </a>
                            <a href="{{ route('admin.market.order.detailes', $order->id) }}"
                                class="btn btn-sm btn-success text-white"><i class="fa fa-book"></i>جزیات</a>
                        </td>
                    </tr>
                </table>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" style="height: 160px" id="printable">
                        {{-- <thead>
                            <tr>
                                <th>#</th>
                                <th class="width-8-rem text-center"><i class="fas fa-cogs"></i>عملیات</th>
                            </tr>
                        </thead> --}}
                        <tbody>
                            {{-- <tr class="table-primary">
                                <th>{{ $order->id }}</th>
                                <td class="width-16-rem text-left">
                                    <a id="print" class="btn btn-sm btn-dark text-white"><i class="fa fa-print"></i> چاپ
                                    </a>
                                    <a class="btn btn-sm btn-success text-white"><i class="fa fa-book"></i>جزیات</a>
                                </td>
                            </tr> --}}
                            <tr class="mb-2">
                                <th>نام مشتری</th>
                                <td class="text-left font-weight-bold">{{ $order->user->full_name ?? '-' }}</td>
                            </tr>
                            <tr class="mb-2">
                                <th>آدرس</th>
                                <td class="text-left font-weight-bold">{{ $order->address->address ?? '-' }}</td>
                            </tr>
                            <tr class="mb-2">
                                <th>شهر</th>
                                <td class="text-left font-weight-bold">{{ $order->address->city->name ?? '-' }}</td>
                            </tr>
                            <tr class="mb-2">
                                <th>کدپستی</th>
                                <td class="text-left font-weight-bold">{{ $order->address->no ?? '-' }}</td>
                            </tr>
                            <tr class="mb-2">
                                <th>واحد</th>
                                <td class="text-left font-weight-bold">{{ $order->address->unit ?? '-' }}</td>
                            </tr>
                            <tr class="mb-2">
                                <th>گیرنده</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->address->recipient_first_name . ' ' . $order->address->recipient_last_name ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>شماره تماس</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->address->mobile ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>نوع پرداخت</th>
                                <td class="text-left font-weight-bold">
                                    @if ($order->payment_type == 0)
                                        آنلاین
                                    @elseif ($order->payment_type == 1)
                                        آفلاین
                                    @else
                                        در محل
                                    @endif
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>وضعیت پرداخت</th>
                                <td class="text-left font-weight-bold">
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
                            </tr>
                            <tr class="mb-2">
                                <th>مبلغ ارسال</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->delivery->amount }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>وضعیت ارسال</th>
                                <td class="text-left font-weight-bold">
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
                            </tr>
                            <tr class="mb-2">
                                <th>تاریخ ارسال</th>
                                <td class="text-left font-weight-bold">
                                    {{ JalaliDate($order->time, 'Y/m/d') ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>مجموع مبلغ سفارش بدون تخفیف</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->order_final_amount ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>مجموع تمامی مبالغ تخفیفات</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->order_discount_amount ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>مبلغ تخفیف همه محصولات</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->order_total_products_discount_amount ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>مبلغ نهایی</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->order_final_amount - $order->order_discount_amount ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>بانک</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->payment->paymentable->gateway ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>کوپن استفاده شده درین تخفیف</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->copan->code ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>تخفیف کد تخفیف</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->order_copan_discount_amount ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>تخفیف عمومی استفاده شده</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->commonDiscount->title ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th> مبلغ تخفیف عمومی</th>
                                <td class="text-left font-weight-bold">
                                    {{ $order->order_common_discount_amount ?? '-' }}
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <th>وضعیت سفارش</th>
                                <td class="text-left font-weight-bold">
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
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('script')
    <script>
        var printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function() {
            printContent('printable');
        })


        function printContent(el) {
            var restorePage = $('body').html();
            var printContent = $('#' + el).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').html(restorePage);
        }
    </script>
@endsection
