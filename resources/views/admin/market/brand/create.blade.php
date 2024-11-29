@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> برند</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد برند</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد برند

                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.brand.index') }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.brand.store') }}" method="POST" id="form"
                        enctype="multipart/form-data">
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">نام فارسی برند</label>
                                <input type="text" class="form-control form-control-sm" name="persian_name"
                                    value="{{ old('persian_name') }}">
                                @error('persian_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="">نام اصلی برند</label>
                                <input type="text" class="form-control form-control-sm" name="original_name"
                                    value="{{ old('original_name') }}">
                                @error('original_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تگ ها</label>
                                <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                    value="{{ old('tags') }}" multiple>
                                <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="">وضعیت</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="0" {{ old('status') }}>فعال</option>
                                    <option value="1" {{ old('status') }}>غیر فعال</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">لوگو</label>
                                <input type="file" class="form-control form-control-sm" name="logo"
                                    value={{ old('logo') }}>
                                @error('logo')
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
    <script>
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
    </script>
@endsection
