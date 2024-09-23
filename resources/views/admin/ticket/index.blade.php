@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">تیکت</a></li>
            <li class="breadcrumb-item active" aria-current="page"> تیکت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تیکت
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm disabled" href="">ایجاد نظر</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm" type="text" name="" id=""
                            placeholder="جستجو...">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نویسنده تیکت</th>
                                <th>عنوان تیکت</th>
                                <th>دسته تیکت</th>
                                <th>اولویت تیکت</th>
                                <th>ارجاع کننده</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>رضا</td>
                                <td>نامعلوم</td>
                                <td>معلوماتی</td>
                                <td>اول</td>
                                <td>مدیر</td>
                                <td class="max-width-16-rem text-left">

                                    <a class="btn btn-info btn-sm" href="{{ route('admin.ticket.show') }}"><i
                                            class="fas fa-eye"> نمایش</i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
