@extends('admin.layouts.master')

@section('head-tag')
    <title>منو</title>
@endsection

@section('content')
<H1>MENU CREATE</H1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item"><a href="#">منو</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد منو</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد منو
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.menu.index') }}">بازگشت</a>
                </section>

                <section>

                    <form>
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">عنوان منو</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="">منوی والد</label>
                                <Select class="form-control form-control-sm">
                                    <option value="">------</option>
                                    <option value="">......</option>
                                </Select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">آدرس url</label>
                                <input type="text" class="form-control form-control-sm" name="category">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="category">
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
