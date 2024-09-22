@extends('admin.layouts.master')

@section('head-tag')
    <title>پیج ساز</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item"><a href="#">منو</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد پیج</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد پیچ
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.page.index') }}">بازگشت</a>
                </section>

                <section>

                    <form>
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">عنوان </label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>

                         
                            <div class="col-md-6 col-12">
                                <label for="">آدرس url</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                         
                            <div class="col-12">
                                <label for=""> محتوا</label>
                                <textarea class="form-control form-control-sm" name="" id="body" rows="6"></textarea>
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
