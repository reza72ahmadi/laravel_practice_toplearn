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
                    <h5>ایجاد رنگ</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.color.index', $product->id) }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.color.store', $product->id) }}" method="POST">
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="color_name">نام رنگ</label>
                                <input type="text" class="form-control form-control-sm" name="color_name"
                                    id="color_name" value="{{ old('color_name') }}">
                                @error('color_name ')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </section>
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="price_increase">افزایش قیمت</label>
                                <input type="text" class="form-control form-control-sm" name="price_increase"
                                    id="price_increase" value="{{ old('price_increase') }}">
                                @error('price_increase')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </section>
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="price_increase">افزایش قیمت</label>
                                <input type="color" class="form-control form-control-sm" name="color"
                                    id="color" value="{{ old('color') }}">
                                @error('color')
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
