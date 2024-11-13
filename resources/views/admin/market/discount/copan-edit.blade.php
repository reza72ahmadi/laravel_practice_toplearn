@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش کوپن تخفیف</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> کوپن</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش کوپن</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش کوپن

                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.discount.copan') }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.discount.copan.update', $copan->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">کد کوپن</label>
                                <input type="text" class="form-control form-control-sm" name="code"
                                    value="{{ old('code', $copan->code) }}">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- type --}}
                            <div class="col-md-6 col-12">
                                <label for="">نوع کوپن</label>
                                <Select name="type" id="type" class="form-control form-control-sm">
                                    <option value="0" @if (old('type', $copan->type) == 0) selected @endif>عمومی</option>
                                    <option value="1" @if (old('type', $copan->type) == 1) selected @endif>خصوصی</option>
                                </Select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- users --}}
                            <div class="col-md-6 col-12">
                                <label for="">مشتریان</label>
                                <Select name="user_id" id="users" class="form-control form-control-sm"
                                    {{ $copan->type == 0 ? 'disabled' : '' }}>

                                    <option value="">--- انتخاب کنید ---</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if (old('user_id', $copan->user_id) == $user->id) selected @endif>
                                            {{ $user->full_name }}</option>
                                    @endforeach
                                </Select>
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- amount_type --}}
                            <div class="col-md-6 col-12">
                                <label for="">نوع تخفیف</label>
                                <Select name="amount_type" id="type" class="form-control form-control-sm">
                                    <option value="0" @if (old('amount_type', $copan->amount_type) == 0) selected @endif>درصدی
                                    </option>
                                    <option value="1" @if (old('amount_type', $copan->amount_type) == 1) selected @endif>عددی
                                    </option>
                                    @error('amount_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </Select>
                            </div>
                            {{-- amount --}}

                            <div class="col-md-6 col-12">
                                <label for="">میزان تخفیف</label>
                                <input name="amount" type="text" class="form-control form-control-sm"
                                    value="{{ old('amount', $copan->amount) }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- discount_ceiling --}}
                            <div class="col-md-6 col-12">
                                <label for="">حداکثر تخفیف</label>
                                <input name="discount_ceiling" type="text" class="form-control form-control-sm"
                                    value="{{ old('discount_ceiling', $copan->discount_ceiling) }}">
                                @error('discount_ceiling')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- status --}}
                            <div class="col-md-6 col-12">
                                <label for="">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm">
                                    <option value="1" @if (old('status', $copan->status) == 1) selected @endif>فعال</option>
                                    <option value="0" @if (old('status', $copan->status) == 0) selected @endif>غیرفعال
                                    </option>
                                </select>
                            </div>
                            {{-- start_date --}}

                            <div class="col-md-6 col-12">
                                <label for="">تاریخ شروع</label>
                                <input id="start_at" name="start_date" type="hidden">
                                <input id="start_at_view" name="start_date_view" type="text"
                                    class="form-control form-control-sm"
                                    value="{{ old('start_date', $copan->start_date) }}">
                                @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- end_date --}}
                            <div class="col-md-6 col-12">
                                <label for="">تاریخ پایان</label>
                                <input id="end_at" name="end_date" type="hidden">
                                <input id="end_at_view" name="end_date_view" type="text"
                                    class="form-control form-control-sm" value="{{ old('end_date', $copan->end_date) }}">
                                @error('end_date')
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
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $('#type').change(function() {
            if ($('#type').find(':selected').val() == '1') {
                $('#users').removeAttr('disabled');
            } else {
                $('#users').attr('disabled', 'disabled');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#start_at_view').pDatepicker({
                format: 'YYYY/MM/DD',
                atField: '#start_at'
            })
            $('#end_at_view').pDatepicker({
                format: 'YYYY/MM/DD',
                atField: '#end_at'
            })
        })
    </script>
@endsection
