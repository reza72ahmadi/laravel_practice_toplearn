@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش کاربران ادمین</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">کاربران ادمین </a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش کاربران ادمین</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش کاربران ادمین
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.user.admin-user.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.user.admin-user.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">نام</label>
                                <input type="text" class="form-control form-control-sm" name="first_name"
                                    value="{{ old('first_name', $user->first_name) }}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">نام خانوادگی</label>
                                <input type="text" class="form-control form-control-sm" name="last_name"
                                    value="{{ old('last_name', $user->last_name) }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 col-12">
                                <label for="">ایمیل</label>
                                <input type="email" class="form-control form-control-sm" name="email"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">شماره موبایل</label>
                                <input type="text" class="form-control form-control-sm" name="mobile"
                                    value="{{ old('mobile', $user->mobile) }}">
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <div class=" col-12">
                                <label for="">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="profile_photo_path"
                                    value="{{ old('profile_photo_path', $user->profile_photo_path) }}">
                                @error('profile_photo_path')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if ($user->profile_photo_path)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Image"
                                            style="width: 100px; height: auto; border-radius: 50%;">
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="col-md-6 col-12">
                                <label for="activation">وضعیت فعال سازی</label>
                                <select class="form-control form-control-sm" name="activation" id="activation">
                                    <option value="0" @if (old('activation', $user->activation) == 0) selected @endif>غیر فعال
                                    </option>
                                    <option value="1" @if (old('activation', $user->activation) == 1) selected @endif>فعال</option>
                                </select>
                                @error('activation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
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
