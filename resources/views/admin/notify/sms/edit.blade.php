@extends('admin.layouts.master')

@section('head-tag')
    <title>اطلاعیه پیامکی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش اطلاعیه پیامکی
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.notify.sms.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.notify.sms.update', $sms->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">عنوان پیامک</label>
                                <input type="text" class="form-control form-control-sm" name="title"
                                    value="{{ old('title', $sms->title) }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class=" col-12 col-md-6">
                                <label for="">تاریخ انتشار</label>
                                <input type="text" id="pulished_at" class="form-control form-control-sm d-none"
                                    name="published_at">
                                <input type="text" id="pulished_at_view" class="form-control form-control-sm">
                                @error('published_at')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class=" col-12">
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
                            <div class=" col-12">
                                <label for="">متن پیامک</label>
                                <textarea class="form-control form-control-sm" name="body" id="body" cols="30" rows="5">{{ old('body', $sms->body) }}</textarea>
                                @error('body')
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
@section('script')
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#pulished_at_view").pDatepicker({
                format: 'YYYY/MM/DD',
                altField: "#pulished_at"
            });
        });
    </script>
@endsection