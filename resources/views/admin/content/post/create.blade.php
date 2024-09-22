@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پیج جدید</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ایجاد پیچ جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد پیج جدید
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.post.index') }}">بازگشت</a>
                </section>

                <section>
                    <form>
                        <section class="row">
                            <div class=" col-12 col-md-6">
                                <label for="">عنوان پست</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class=" col-12 col-md-6">
                                <label for="">انتخاب دسته</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="">دسته را انتخاب کندی</option>
                                    <option value="">دسته را انتخاب کردید</option>
                                </select>
                            </div>
                            <div class=" col-12 col-md-6">
                                <label for="">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="category">
                            </div>
                            <div class=" col-12 col-md-6">
                                <label for="">تاریخ انتشار</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-12">
                                <label for="">متن پست</label>
                                <textarea class="form-control form-control-sm" name="" id="body" rows="6"></textarea>
                            </div>
                            {{-- <section class="col-12 border-top">
                                <div class="row py-3">
                                    <section class="col-md-3 col-md-6">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="ویژه گی ...">
                                    </section>
                                    <section class="col-md-3 col-6">
                                        <input type="text" class="form-control form-control-sm" placeholder="مقدار ...">
                                    </section>
                                </div>
                            </section> --}}
                        </section>

                        {{-- <section>
                            <button type="button" class="btn btn-success btn-sm mt-3">افزودن</button>
                        </section> --}}
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
