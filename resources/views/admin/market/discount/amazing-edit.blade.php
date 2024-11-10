@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد فروش شگفت انگیز</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> فروش شگفت انگیز</a></li>
            <li class="breadcrumb-item active" aria-current="page">افزودن به فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        افزودن به فروش شگفت انگیز
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.discount.amazingSale') }}">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.discount.amazingSale.update', $amazingSale->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="product_id">نام کالا</label>
                                <select name="product_id" id="product_id" class="form-control form-control-sm">
                                    <option value="">---انتخاب کنید---</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            @if (old('product_id', $amazingSale->product_id) == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="percentage">درصد تخفیف</label>
                                <input type="text" class="form-control form-control-sm" name="percentage" id="percentage"
                                    value="{{ old('percentage', $amazingSale->percentage) }}">
                                @error('percentage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" col-12 col-md-6">
                                <label for="">تاریخ شروع</label>
                                <input type="text" id="start_at" class="form-control form-control-sm d-none"
                                    name="start_date">
                                <input type="text" id="start_at_view" class="form-control form-control-sm">
                                @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">تاریخ پایان</label>
                                <input type="text" id="end_at" class="form-control form-control-sm d-none"
                                    name="end_date">
                                <input type="text" id="end_at_view" class="form-control form-control-sm">
                                @error('end_date')
                                    <span>{{ $message }}</span>
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
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#start_at_view').pDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_at'
            })
            $('#end_at_view').pDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#end_at'
            })
        })
    </script>
@endsection
