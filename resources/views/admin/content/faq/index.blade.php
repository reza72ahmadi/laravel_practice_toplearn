@extends('admin.layouts.master')

@section('head-tag')
    <title>سوالات متدوال</title>
@endsection

@section('content')
<h1>FAQ INDEX</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page">سوالات متداول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        سوالات متداول
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.faq.create') }}">ایجادپرسش جدید</a>
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
                                <th>پرسش</th>
                                <th>خلاصه پاسخ</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>این یک سوال تکراری است</td>
                                <td>و این هم خلاصه پاسخ است</td>
                                <td class="max-width-16-rem text-left">
                                    <a class="btn btn-primary btn-sm" href=""><i class="fas fa-edit"> ویرایش</i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt">
                                            حذف</i></button>
                                </td>
                            </tr>
                            {{-- <tr>
                                <th>2</th>
                                <td>نمایشگر</td>
                                <td>کالای الکتریکی</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href=""><i class="fas fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>نمایشگر</td>
                                <td>کالای الکتریکی</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href=""><i class="fas fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
