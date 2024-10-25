@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش دسته بندی</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.category.index') }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data" id="form">
                        @csrf
                        @method('put')
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="name">دسته بندی</label>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="parent_id">دسته والد</label>
                                <select class="form-control form-control-sm" name="parent_id" id="parent_id">
                                    <option value="">مینوی اصلی</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            @if (old('parent_id', $category->parent_id) == $cat->id) selected @endif>
                                            {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
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
                                <label for="show_in_menu">نمایش در مینو</label>
                                <select class="form-control form-control-sm" name="show_in_menu" id="show_in_menu">
                                    <option value="0" @if (old('show_in_menu', $category->show_in_menu) == 0) selected @endif>غیر فعال
                                    </option>
                                    <option value="1" @if (old('show_in_menu', $category->show_in_menu) == 1) selected @endif>فعال</option>
                                </select>
                                @error('show_in_menu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <select class="form-control form-control-sm" name="status" id="status">
                                    <option value="0" @if (old('status', $category->status) == 0) selected @endif>غیر فعال
                                    </option>
                                    <option value="1" @if (old('status', $category->status) == 1) selected @endif>فعال</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="tags">تگ ها</label>
                                <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                    value="{{ old('tags', $category->tags) }}">
                                <select class="select2 form-control form-control-sm" id="select_tags" multiple>
                                    @foreach (explode(',', old('tags', $category->tags)) as $tag)
                                        <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Profile Image"
                                        style="width: 60px; height: auto; border-radius: 50%;">
                                </div>
                            @endif
                            <div class="col-12">
                                <label for="description">توضیحات</label>
                                <textarea class="form-control form-control-sm" name="description" id="body" rows="6">{{ old('description', $category->description) }}</textarea>
                                @error('description')
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
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('body', {
                height: 300,
            });

            var tags_input = $('#tags');
            var select_tags = $('#select_tags');

            select_tags.select2({
                placeholder: "لطفا تگ های خودرا انتخاب کنید",
                tags: true
            });

            select_tags.on('change', function() {
                var selectedTags = $(this).val().join(',');
                tags_input.val(selectedTags);
            });
        });
    </script>
@endsection
