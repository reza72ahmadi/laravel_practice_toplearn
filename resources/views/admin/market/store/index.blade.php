@extends('admin.layouts.master')

@section('head-tag')
    <title>انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        انبار
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm disabled" href="">ایجاد انبار جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm" type="text" name="" id=""
                            placeholder="جستجو...">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>موجودی کالا</th>
                                <th>ورودی انبر</th>
                                <th>خروجی انبار</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ asset('storage/' . $product->image) }}" alt=""
                                            style="width: 60px; height: auto; border-radius: 50%;"></td>
                                    <td>{{ $product->sold_number }}</td>
                                    <td>{{ $product->frozen_number }}</td>
                                    <td>{{ $product->marketable_number }}</td>
                                    <td class="max-width-16-rem text-left">

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.market.store.add-to-store') }}"><i
                                                class="fas fa-edit">افزایش
                                                موجودی</i></a>
                                        <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit">
                                                اصلاح موجودی</i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
