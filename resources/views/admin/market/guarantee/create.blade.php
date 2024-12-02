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
            <li class="breadcrumb-item active" aria-current="page">ایجادگارانتی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجادگارانتی

                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm"
                        href="{{ route('admin.market.guarantee.index', $product->id) }}">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.guarantee.store', $product->id) }}" method="POST">
                        @csrf
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">نام گارانتی</label>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="">افزایش قیمت</label>
                                <input type="text" class="form-control form-control-sm" name="price_increase"
                                    value="{{ old('price_increase') }}">
                                @error('price_increase')
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
