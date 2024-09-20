@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> نظرات</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش نظرات
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.comment.index') }}">بازگشت</a>
                </section>

                <section class="card">
                    <section class="card-header text-white bg-custom-yellow">
                        0089004 ali ahmadi </section>
                    <section class="card-body">
                        <h5 class="card-title"> مشخصات کالا: fkdjfdkfjlsdk</h5>
                        <p class="card-text">jflkddakjsdfdsjflk dsdfj sdlfjsdlkjf</p>
                    </section>
                </section>

                <section>
                    <form>
                        <section class="row">
                            <div class="col-12">
                                <label for="">پاسخ ادمین:</label>
                                <textarea class="form-control form-control-sm" name="" id="" cols="30" rows="4"></textarea>
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
