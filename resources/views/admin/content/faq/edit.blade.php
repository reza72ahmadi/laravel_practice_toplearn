@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش پرسش و پاسخ</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش پرسش و پاسخ</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش پرسش و پاسخ
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.faq.index') }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.faq.update', $faq->id) }}" method="POST" id="form">
                        @csrf
                        @method('put')
                        <section class="row">
                            <div class="col-12">
                                <label for="question">پرسش</label>
                                <textarea class="form-control form-control-sm" name="question" id="question" rows="6">{{ old('question', $faq->question) }}</textarea>
                                @error('question')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="answer">پاسخ</label>
                                <textarea class="form-control form-control-sm" name="answer" id="answer" rows="6">{{ old('answer', $faq->answer) }}</textarea>
                                @error('answer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="tags">تگ ها</label>
                                <input type="hidden" name="tags" id="tags" value="{{ old('tags', $faq->tags) }}">
                                <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <Select class="form-control form-control-sm" name="status" id="status">
                                    <option value="0" @if (old('status', $faq->status) === 0) selected @endif>غیر فعال
                                        </ption>
                                    <option value="1" @if (old('status', $faq->status) === 1) selected @endif>فعال</option>
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

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {

            CKEDITOR.replace('question', {
                height: 200,
            });
            CKEDITOR.replace('answer', {
                height: 200,
            });

            // Initialize select2 for tags
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');

            select_tags.select2({
                placeholder: "لطفا تگ های خودرا انتخاب کنید",
                tags: true
            });

            // Update tags input value on form submission
            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedTags = select_tags.val().join(',');
                    tags_input.val(selectedTags);
                }
            });

            // Populate select2 with old tags if available
            var old_tags = tags_input.val();
            if (old_tags) {
                var tagsArray = old_tags.split(',');
                select_tags.val(tagsArray).trigger('change');
            }
        });
    </script>
@endsection
