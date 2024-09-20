@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجادکالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> برند</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد کالا
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.product.index') }}">بازگشت</a>
                </section>

                <section>
                    <form>
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">نام کالا</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">دسته کالا</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">فرم کالا</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="">تصویر</label>
                                <input type="file" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">قیمت کالا</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">وزن</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-12">
                                <label for="">توضیحات</label>
                                <textarea class="form-control form-control-sm" name="" id="body" rows="6"></textarea>
                            </div>
                            <section class="col-12 border-top">
                                <div class="row py-3">
                                    <section class="col-md-3 col-6">
                                        <input type="text" class="form-control form-control-sm" placeholder="ویژه گی ...">
                                    </section>
                                    <section class="col-md-3 col-6">
                                        <input type="text" class="form-control form-control-sm" placeholder="مقدار ...">
                                    </section>
                                </div>
                            </section>
                        </section>

                        <section>
                            <button type="button" class="btn btn-success btn-sm mt-3">افزودن</button>
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
@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('body', {
                height: 300,
            });
        });
    </script>
@endsection
