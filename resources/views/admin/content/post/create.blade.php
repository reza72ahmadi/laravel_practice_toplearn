@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پست جدید</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ایجاد پست جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد پست جدید
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.post.index') }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.post.store') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        <section class="row">
                            <div class=" col-12 col-md-6">
                                <label for="">عنوان پست</label>
                                <input type="text" class="form-control form-control-sm" name="title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class=" col-12 col-md-6">
                                <label for="">انتخاب دسته</label>
                                <select class="form-control form-control-sm" name="category_id" id=""
                                    value ="">
                                    <option value="">لطفا انتخاب کنید</option>
                                    @foreach ($postCategories as $postCategory)
                                        <option value="{{ $postCategory->id }}"
                                            @if (old('category_id') == $postCategory->id) selected @endif>
                                            {{ $postCategory->name }} </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class=" col-12 col-md-6">
                                <label for="">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="image">
                                @error('image')
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

                            <div class="col-md-6 col-12">
                                <label for="commentable">امکان درج کامنت</label>
                                <Select class="form-control form-control-sm" name="commentable" id="commentable">
                                    <option value="0" @if (old('commentable') === 0) selected @endif>غیر فعال
                                        </ption>
                                    <option value="1" @if (old('commentable') === 1) selected @endif>فعال</option>
                                    @error('commentable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </Select>
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

                            <div class="col-12">
                                <label for="tags">تگ ها</label>
                                <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                    value="{{ old('tags') }}" multiple>
                                <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="">خلاصه پست</label>
                                <textarea class="form-control form-control-sm" name="summary" id="summary" rows="6">{{ old('summary') }}</textarea>
                                @error('summary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="">متن پست</label>
                                <textarea class="form-control form-control-sm" name="body" id="body" rows="6">{{ old('body') }}</textarea>
                                @error('body')
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
@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('body', {
                height: 300,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('summary', {
                height: 300,
            });


            var tags_input = $('#tags');
            var select_tags = $('#select_tags');

            select_tags.select2({
                placeholder: "لطفا تگ های خودرا انتخاب کنید",
                tags: true
                //  data: default_data
            });

            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#pulished_at_view").pDatepicker({
                format: 'YYYY/MM/DD',
                altField: "#pulished_at"
            });
        });
    </script>
    </script>
@endsection
