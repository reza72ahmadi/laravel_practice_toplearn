@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش سایت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش سایت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش سایت</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.setting.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.setting.update', $setting->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">

                            <div class="col-md-6 col-12">
                                <label for="name">عنوان سایت</label>
                                <input type="text" class="form-control form-control-sm" name="title"
                                    value="{{ old('title', $setting->title) }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="name">توضیحات سایت</label>
                                <input type="text" class="form-control form-control-sm" name="description"
                                    value="{{ old('description', $setting->description) }}">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="name">کلمات کلیدی سایت</label>
                                <input type="text" class="form-control form-control-sm" name="keywords"
                                    value="{{ old('keywords', $setting->keywords) }}">
                                @error('keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="name">لوگوی سایت</label>
                                <input type="file" class="form-control form-control-sm" name="logo">
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="name">آیکن سایت</label>
                                <input type="file" class="form-control form-control-sm" name="icon">
                                   
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </section>
                        <section>
                            <button type="submit" class="btn btn-primary btn-sm mt-3">ثبت</button>
                        </section>
                    </form>

                </section>
            </section>
        </section>
    </section>
@endsection
