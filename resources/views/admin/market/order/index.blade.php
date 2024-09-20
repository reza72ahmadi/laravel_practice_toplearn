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
                                <th>مبلغ سفارش</th>
                                <th>مبلغ تخیف</th>
                                <th>مبلغ نهایی</th>
                                <th>وضعیت پرداخت</th>
                                <th>شیوهر پرداخت</th>
                                <th>بانک</th>
                                <th>وضعیت ارسالی</th>
                                <th>شیوه ارسال</th>
                                <th>وضعیت سفارش</th>
                                <th class="width-8-rem text-center"><i class="fas fa-cogs"></i>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <td>نمایشگر</td>
                                <td class="max-width-8-rem text-left">
                                    <div class="dropdown">
                                        <a id="dropdownMenuLink" data-toggle="dropdown"
                                            class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                            href="" aria-expanded="false"><i class="fas fa-tools"></i>عملیات</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-images"></i>مشاهده فاکتور</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-list-ul"></i>تغیروضعیت ارسال</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-edit"></i>تغیروضعیت سفارش</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-window-close"></i>باطل کردن سفارش</a>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <td>نمایشگر</td>
                                <td class="max-width-8-rem text-left">
                                    <div class="dropdown">
                                        <a id="dropdownMenuLink" data-toggle="dropdown"
                                            class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                            href="" aria-expanded="false"><i class="fas fa-tools"></i>عملیات</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-images"></i>مشاهده فاکتور</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-list-ul"></i>تغیروضعیت ارسال</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-edit"></i>تغیروضعیت سفارش</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-window-close"></i>باطل کردن سفارش</a>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <td>نمایشگر</td>
                                <td class="max-width-8-rem text-left">
                                    <div class="dropdown">
                                        <a id="dropdownMenuLink" data-toggle="dropdown"
                                            class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                            href="" aria-expanded="false"><i class="fas fa-tools"></i>عملیات</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-images"></i>مشاهده فاکتور</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-list-ul"></i>تغیروضعیت ارسال</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-edit"></i>تغیروضعیت سفارش</a>
                                                <a class="dropdown-item text-right" href=""><i class="fas fa-window-close"></i>باطل کردن سفارش</a>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
