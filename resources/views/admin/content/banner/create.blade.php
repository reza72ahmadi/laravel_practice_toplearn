@extends('admin.layouts.master')

@section('head-tag')
    <title>بنر</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد بنر</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد بنر</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.banner.index') }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.banner.store') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf

                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="name">بنر</label>
                                <input type="text" class="form-control form-control-sm" name="title" id="title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="image">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="image" id="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <Select class="form-control form-control-sm" name="status" id="status">
                                    <option value="0" @if (old('status') === 0) selected @endif>غیر فعال
                                        </ption>
                                    <option value="1" @if (old('status') === 1) selected @endif>فعال
                                    </option>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </Select>
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="url">آدرس URL</label>
                                <input type="text" class="form-control form-control-sm" name="url"
                                    value="{{ old('url') }}">
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class=" col-12">
                                <label for="position">موقعیت</label>
                                <select name="position" class="form-control form-control-sm">
                                    <option value="">---انتخاب کنید---</option>
                                    @foreach ($positions as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('position')
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
