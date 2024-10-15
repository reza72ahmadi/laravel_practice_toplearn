@extends('admin.layouts.master')

@section('head-tag')
    <title>نتظیمات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item active" aria-current="page">تنظیمات </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تنظیمات
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm disabled" href="">ایجاد تنظیمات جدید</a>
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
                                <th>عنوان سایت</th>
                                <th>توضیحات سایت</th>
                                <th>کلمات کلیدی سایت</th>
                                <th>لوگوی سایت</th>
                                <th>آیکن سایت سایت</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>{{ $setting->title }}</td>
                                <td>{{ $setting->description }}</td>
                                <td>{{ $setting->keywords }}</td>
                                <td><img src="{{ asset('storage/'. $setting->logo) }}" alt="Setting Image"
                                        style="width: 60px; height: auto; border-radius: 50%">
                                </td>
                                <td><img src="{{ asset('storage/' . $setting->icon) }}" alt="Setting Image"
                                        style="width: 60px; height: auto; border-radius: 50%">
                                </td>

                                <td class="max-width-16-rem text-left">
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.setting.edit', $setting->id) }}"><i class="fas fa-edit">
                                            ویرایش</i></a>


                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
