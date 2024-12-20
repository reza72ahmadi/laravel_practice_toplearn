@extends('admin.layouts.master')

@section('head-tag')
    <title>روش های ارسال</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> روش های ارسال</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش روش ارسال</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد روش ارسال
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.delivery.index') }}">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.delivery.store') }}" method="POST">
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">نام روش ارسال</label>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">هزینه روش ارسال</label>
                                <input type="text" class="form-control form-control-sm" name="amount"
                                    value="{{ old('amount') }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">زمان ارسال</label>
                                <input type="text" class="form-control form-control-sm" name="delivery_time"
                                    value="{{ old('delivery_time') }}">
                                @error('delivery_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="">واحد زمان ارسال</label>
                                <input type="text" class="form-control form-control-sm" name="delivery_time_unit"
                                    value="{{ old('delivery_time_unit') }}">
                                @error('delivery_time_unit')
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
