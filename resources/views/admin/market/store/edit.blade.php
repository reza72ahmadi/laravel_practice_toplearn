@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش موجودی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">انبار</a></li>
            <li class="breadcrumb-item"><a href="#"></a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش موجودی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش موجودی
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.store.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.market.store.update', $product->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">تعداد ریزرف شده</label>
                                <input type="text" class="form-control form-control-sm" name="frozen_number"
                                    value="{{ old('frozen_number', $product->frozen_number) }}">
                                @error('frozen_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تعداد فروخته شده</label>
                                <input type="text" class="form-control form-control-sm" name="sold_number"
                                    value="{{ old('sold_number', $product->sold_number) }}">
                                @error('sold_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تعداد قابل فروش</label>
                                <input type="text" class="form-control form-control-sm" name="marketable_number"
                                    value="{{ old('marketable_number', $product->marketable_number) }}">
                                @error('marketable_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="col-12">
                                <label for="">توضیحات</label>
                                <textarea name="description" class="form-control form-control-sm" rows="4">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}

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
