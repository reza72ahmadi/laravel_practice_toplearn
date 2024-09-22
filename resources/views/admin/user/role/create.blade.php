@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد نقش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">نقش ها</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ایجاد نقش </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد نقش
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.user.role.index') }}">بازگشت</a>
                </section>

                <section>

                    <form>
                        <section class="row">
                            <div class="col-md-5 col-12">
                                <label for="">عنوان نقش</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>

                            <div class="col-md-5 col-12">
                                <label for="">توضیح نقش</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-md-2 col-12">
                                <button class="btn btn-primary btn-sm mt-4">ثبت</button>
                            </div>
                        </section>

                        <section class="col-12">
                            <section class="row border-top mt-3 py-3">
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="check1"
                                            checked>
                                        <label class="form-check-label mr-3 mt-1" for="check1">نمایش دسته جدید</label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="check2"
                                            checked>
                                        <label class="form-check-label mr-3 mt-1" for="check2">نمایش دسته جدید</label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="check3"
                                            checked>
                                        <label class="form-check-label mr-3 mt-1" for="check3">نمایش دسته جدید</label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="check4"
                                            checked>
                                        <label class="form-check-label mr-3 mt-1" for="check4">نمایش دسته جدید</label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="check5"
                                            checked>
                                        <label class="form-check-label mr-3 mt-1" for="check5">ویرایش دسته جدید</label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="check6"
                                            checked>
                                        <label class="form-check-label mr-3 mt-1" for="check6"> ویرایش کالای جدید</label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="check7"
                                            checked>
                                        <label class="form-check-label mr-3 mt-1" for="check7">حذف دسته جدید</label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="" id="check8"
                                            checked>
                                        <label class="form-check-label mr-3 mt-1" for="check8">حذف کالای جدید</label>
                                    </div>
                                </section>
                            </section>
                        </section>
                    </form>

                </section>
            </section>
        </section>
    </section>
@endsection
