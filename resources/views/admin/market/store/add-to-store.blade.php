@extends('admin.layouts.master')

@section('head-tag')
    <title>افزودن به انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">انبار</a></li>
            <li class="breadcrumb-item"><a href="#"></a></li>
            <li class="breadcrumb-item active" aria-current="page">افزودن به انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد فرم کالا</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.store.index') }}">بازگشت</a>
                </section>

                <section>

                    <form>
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">نام تحویل گیرنده</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">نام تحویل دهنده</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تعداد</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-12">
                                <label for="">توضیحات</label>
                                <textarea  class="form-control form-control-sm" rows="4"></textarea>
                            </div>

                        </section>
                        <section>
                            <button class="btn btn-primary btn-sm mt-3">ثبت</button>
                        </section>
                    </form>

                </section>
            </section>
        </section>
    </section>
@endsection
