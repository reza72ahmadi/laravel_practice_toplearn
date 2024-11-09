@extends('admin.layouts.master')

@section('head-tag')
    <title>مقدار فرم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد مقدار فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد مقدار فرم کالا</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm"
                        href="{{ route('admin.market.value.index', $categoryAttribute->id) }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.market.value.store', $categoryAttribute->id) }}" method="POST">
                        @csrf
                        <section class="row">

                            <div class="col-12 col-md-6">
                                <label for="">انتخاب محصول</label>
                                <Select class="form-control form-control-sm" name="product_id">
                                    <option value="">--- انتخاب کنید ---</option>
                                    @foreach ($categoryAttribute->category->products as $product)
                                        <option value="{{ $product->id }}"
                                            @if (old('product_id') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </Select>
                                @error('product_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="">مقدار</label>
                                <input type="text" class="form-control form-control-sm" name="value"
                                    value="{{ old('value') }}">
                                @error('value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="price_increase">افزایش قیمت</label>
                                <input type="text" class="form-control form-control-sm" name="price_increase"
                                    id="price_increase" value="{{ old('price_increase') }}">
                                @error('price_increase')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="type">نوع</label>
                                <Select class="form-control form-control-sm" name="type" id="type">
                                    <option value="0" @if (old('type') === 0) selected @endif>ساده 
                                        </ption>
                                    <option value="1" @if (old('type') === 1) selected @endif>انتخابی</option>
                                    @error('type')
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
