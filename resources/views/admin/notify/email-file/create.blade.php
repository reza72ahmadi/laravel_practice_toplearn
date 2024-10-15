@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد اطلاعیه ایمیلی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد اطلاعیه ایمیلی

                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm"
                        href="{{ route('admin.notify.email-file.index', $email->id) }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.notify.email-file.store', $email->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <section class="row">
                            <div class=" col-12 col-md-6">
                                <label for=""> فایل</label>
                                <input type="file" name="file" class="form-control form-control-sm">
                                @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <Select class="form-control form-control-sm" name="status" id="status">
                                    <option value="0" @if (old('status') === 0) selected @endif>غیر فعال
                                        </ption>
                                    <option value="1" @if (old('status') === 1) selected @endif>فعال</option>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </Select>
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

