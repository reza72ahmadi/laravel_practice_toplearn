@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالا</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">برند</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد کالا</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.product.index') }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.product.store') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="name">نام کالا</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="category_id">انتخاب دسته</label>
                                <select name="category_id" id="category_id" class="form-control form-control-sm">
                                    <option value="">دسته را انتخاب کنید</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (old('category_id') == $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="brand_id">انتخاب برند</label>
                                <select name="brand_id" id="brand_id" class="form-control form-control-sm">
                                    <option value="">برند را انتخاب کنید</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            @if (old('brand_id') == $brand->id) selected @endif>
                                            {{ $brand->original_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
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
                                <label for="weight">وزن</label>
                                <input type="text" class="form-control form-control-sm" name="weight" id="weight"
                                    value="{{ old('weight') }}">
                                @error('weight')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="length">طول</label>
                                <input type="text" class="form-control form-control-sm" name="length" id="length"
                                    value="{{ old('length') }}">
                                @error('length')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="width">عرض</label>
                                <input type="text" class="form-control form-control-sm" name="width" id="width"
                                    value="{{ old('width') }}">
                                @error('width')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="height">ارتفاع</label>
                                <input type="text" class="form-control form-control-sm" name="height" id="height"
                                    value="{{ old('height') }}">
                                @error('height')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="price">قیمت کالا</label>
                                <input type="text" class="form-control form-control-sm" name="price" id="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="introduction">توضیحات</label>
                                <textarea class="form-control form-control-sm" name="introduction" id="body" rows="6">{{ old('introduction') }}</textarea>
                                @error('introduction')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <select class="form-control form-control-sm" name="status" id="status">
                                    <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
                                    <option value="0" @if (old('status') == 0) selected @endif>غیرفعال
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="marketable">قابل فروش بودن</label>
                                <select class="form-control form-control-sm" name="marketable" id="marketable">
                                    <option value="1" @if (old('marketable') == 1) selected @endif>فعال</option>
                                    <option value="0" @if (old('marketable') == 0) selected @endif>غیرفعال
                                    </option>
                                </select>
                                @error('marketable')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="tags">تگ ها</label>
                                <input type="hidden" class="form-control form-control-sm" id="tags" name="tags"
                                    value="{{ old('tags') }}">
                                <select class="form-control form-control-sm" id="select_tags" multiple></select>
                                @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="published_at">تاریخ انتشار</label>
                                <input type="text" id="published_at" class="form-control form-control-sm d-none"
                                    name="published_at">
                                <input type="text" id="published_at_view" class="form-control form-control-sm"
                                    value="{{ old('published_at') }}">
                                @error('published_at')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <section class="col-12 border-top">
                                <div class="row py-3">
                                    <section class="col-md-3 col-6">
                                        <input name="meta_key[]" type="text" class="form-control form-control-sm"
                                            placeholder="ویژگی ...">
                                        @error('meta_key.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </section>

                                    <section class="col-md-3 col-6">
                                        <input name="meta_value[]" type="text" class="form-control form-control-sm"
                                            placeholder="مقدار ...">
                                        @error('meta_value.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </section>

                                </div>
                                <section>
                                    <button id="btn-copy" type="button"
                                        class="btn btn-success btn-sm mt-3">افزودن</button>
                                </section>
                            </section>
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
                height: 200
            });

            $("#published_at_view").pDatepicker({
                format: 'YYYY/MM/DD',
                altField: "#published_at",
                altFormat: 'X',
                observer: true,
                timePicker: {
                    enabled: false
                }
            });

            var tags_input = $('#tags');
            var select_tags = $('#select_tags');

            select_tags.select2({
                placeholder: "لطفا تگ های خودرا انتخاب کنید",
                tags: true
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
        $(function() {
            $('#btn-copy').on('click', function() {
                var ele = $(this).parent().prev().clone(true);
                $(this).before(ele);
            });
        })
    </script>
@endsection
