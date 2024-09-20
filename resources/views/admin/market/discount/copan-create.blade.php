@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کوپن تخفیف</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> کوپن</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد کوپن</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد کوپن

                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.discount.copan') }}">بازگشت</a>
                </section>

                <section>
                    <form>
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">کد کوپن</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">نوع کوپن</label>
                                <Select class="form-control form-control-sm">
                                    <option value="">عمومی</option>
                                    <option value="">خصوصی</option>
                                </Select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">درصد تخفیف</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">حداکثر تخفیف</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">عنوان مناسبت</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تاریخ شروع</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تاریخ پایان</label>
                                <input type="text" class="form-control form-control-sm">
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
