@extends('admin.layouts.master')

@section('head-tag')
    <title>فرم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش فرم کالا</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.property.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.market.property.update', $categoryAttribute->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">نام فرم</label>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    value="{{ old('name', $categoryAttribute->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">واحد اندازه گیری</label>
                                <input type="text" class="form-control form-control-sm" name="unit"
                                    value="{{ old('unit', $categoryAttribute->unit) }}">
                                @error('unit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="">فرم والد</label>
                                <Select class="form-control form-control-sm" name="category_id">
                                    <option value="">--- انتخاب کنید ---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (old('category_id', $categoryAttribute->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </Select>
                                @error('category_id')
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
