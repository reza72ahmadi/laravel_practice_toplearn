@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش اطلاعیه ایمیلی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش اطلاعیه ایمیلی

                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm"
                        href="{{ route('admin.notify.email-file.index', $file->email->id) }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.notify.email-file.update', $file->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">

                            <div class=" col-12 col-md-6">
                                <label for=""> فایل</label>
                                <input type="file" name="file" class="form-control form-control-sm"
                                    value="{{ old('file', 'http://127.0.0.1:8000/' . $file->file_path) }}">
                                @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <Select class="form-control form-control-sm" name="status" id="status">
                                    <option value="0" @if (old('status', $file->status) === 0) selected @endif>غیر فعال
                                        </ption>
                                    <option value="1" @if (old('status', $file->status) === 1) selected @endif>فعال</option>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </Select>
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
{{-- @section('script')
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#pulished_at_view").pDatepicker({
                format: 'YYYY/MM/DD',
                altField: "#pulished_at",
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true,
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('body', {
                height: 300,
            });
        });
    </script>
@endsection --}}
