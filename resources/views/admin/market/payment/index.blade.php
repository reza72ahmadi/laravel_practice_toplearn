@extends('admin.layouts.master')

@section('head-tag')
    <title>پرداخت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
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
                                <th>کدتراکنش</th>
                                <th>بانک</th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="width-22-rem text-center"><i class="fas fa-cogs"></i>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>3239</td>
                                <th>عزیزبانک</th>
                                <td>کامران</td>
                                <th>تاییدشده</th>
                                <td>آنلاین</td>
                                <td class="max-width-22-rem text-left">
                                    <a class="btn btn-sm btn-info" href=""><i class="fas fa-edit"></i>مشاهده</a>
                                    <a class="btn btn-sm btn-warning" href=""><i class="fas fa-window-close"></i>باطل
                                        کردن</a>
                                    <a class="btn btn-sm btn-danger" href=""><i
                                            class="fas fa-reply"></i>برگرداندن</a>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>3239</td>
                                <th>عزیزبانک</th>
                                <td>کامران</td>
                                <th>تاییدشده</th>
                                <td>آفلاین</td>
                                <td class="max-width-22-rem text-left">
                                    <a class="btn btn-sm btn-info" href=""><i class="fas fa-edit"></i>مشاهده</a>
                                    <a class="btn btn-sm btn-warning" href=""><i class="fas fa-window-close"></i>باطل
                                        کردن</a>
                                    <a class="btn btn-sm btn-danger" href=""><i
                                            class="fas fa-reply"></i>برگرداندن</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
