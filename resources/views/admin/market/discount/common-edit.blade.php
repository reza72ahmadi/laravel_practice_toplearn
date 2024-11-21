@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش تخفیف عمومی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> کوپن</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش تخفیف عمومی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش تخفیف عمومی

                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.discount.commonDiscount') }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.discount.commonDiscount.update', $commonDiscount->id) }}"
                        method="POST">
                        @method('put')
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">درصد تخفیف</label>
                                <input name="percentage" type="text" class="form-control form-control-sm"
                                    value="{{ old('percentage', $commonDiscount->percentage) }}">
                                @error('percentage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">حداکثر تخفیف</label>
                                <input name="discount_ceiling" type="text" class="form-control form-control-sm"
                                    value="{{ old('discount_ceiling', $commonDiscount->discount_ceiling) }}">
                                @error('discount_ceiling')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">حداقل مبلغ خرید</label>
                                <input name="minimal_order_amount" type="text" class="form-control form-control-sm"
                                    value="{{ old('minimal_order_amount', $commonDiscount->minimal_order_amount) }}">
                                @error('minimal_order_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for=""> عنوان مناسبت</label>
                                <input name="title" type="text" class="form-control form-control-sm"
                                    value="{{ old('title', $commonDiscount->title) }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" col-12 col-md-6">
                                <label for="">تاریخ شروع</label>
                                <input type="text" id="start_date"
                                    class="form-control form-control-sm d-none"name="start_date">
                                <input type="text" id="start_date_view" class="form-control form-control-sm">
                                @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" col-12 col-md-6">
                                <label for="">تاریخ ختم</label>
                                <input type="text" id="end_date"
                                    class="form-control form-control-sm d-none"name="end_date">
                                <input type="text" id="end_date_view" class="form-control form-control-sm">
                                @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <Select class="form-control form-control-sm" name="status" id="status">
                                    <option value="0" @if (old('status', $commonDiscount->status) === 0) selected @endif>غیر فعال
                                        </ption>
                                    <option value="1" @if (old('status', $commonDiscount->status) === 1) selected @endif>فعال</option>
                                    @error('status')
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
@section('script')
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#start_date_view").pDatepicker({
                format: 'YYYY/MM/DD',
                altField: "#start_date"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#end_date_view").pDatepicker({
                format: 'YYYY/MM/DD',
                altField: "#end_date"
            });
        });
    </script>
@endsection
