@extends('admin.layouts.master')

@section('head-tag')
    <title>تخفیف عمومی </title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">تخفیف عمومی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>تخفیف عمومی</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.discount.commonDiscount.create') }}">ایجاد تخفیف
                        عمومی </a>
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
                                <td>درصد تخفیف</td>
                                <td>سقف تخفیف</td>
                                <td>عنوان مناسبت</td>
                                <td>تاریخ شروع</td>
                                <td>تاریخ پایان</td>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th>1</th>
                                <td>10%</td>
                                <td>50 فیصد</td>
                                <td>سال نو</td>
                                <td>تاریخ شروع</td>
                                <td>تاریخ پایان</td>
                                <td class="max-width-16-rem text-left">
                                    <a class="btn btn-primary btn-sm" href=""><i class="fas fa-edit"> ویرایش</i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt">
                                            حذف</i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
