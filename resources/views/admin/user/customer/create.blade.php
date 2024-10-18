@extends('admin.layouts.master')

@section('head-tag')
    <title>مشتریان</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ایجاد مشتری جدید </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد مشتری جدید
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.user.customer.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.user.customer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">نام</label>
                                <input type="text" class="form-control form-control-sm" name="first_name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">نام خانوادگی</label>
                                <input type="text" class="form-control form-control-sm" name="last_name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">ایمیل</label>
                                <input type="email" class="form-control form-control-sm" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">شماره موبایل</label>
                                <input type="text" class="form-control form-control-sm" name="mobile"
                                    value="{{ old('mobile') }}">
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">کلمه عبور</label>
                                <input type="password" class="form-control form-control-sm" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تکرار کلمه عبور</label>
                                <input type="password" class="form-control form-control-sm" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="profile_photo_path">
                                @error('profile_photo_path')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="activation">وضعیت فعال سازی</label>
                                <select class="form-control form-control-sm" name="activation" id="activation">
                                    <option value="0" @if (old('activation') == 0) selected @endif>غیر فعال
                                    </option>
                                    <option value="1" @if (old('activation') == 1) selected @endif>فعال</option>
                                </select>
                                @error('activation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
