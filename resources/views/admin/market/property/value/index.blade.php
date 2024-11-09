@extends('admin.layouts.master')

@section('head-tag')
    <title>مقدار فرم کالا </title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">مقدار فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مقدار فرم کالا
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <div>
                        <a class="btn btn-info btn-sm"
                            href="{{ route('admin.market.value.create', $categoryAttribute->id) }}">ایجاد مقدار فرم کالا</a>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.market.property.index') }}">بازگشت</a>
                    </div>
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
                                <th>نام فرم</th>
                                <th>نام محصول</th>
                                <th>مقدار</th>
                                <th>افزایش قیمت</th>
                                <th>نوع</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryAttribute->values as $value)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $categoryAttribute->name }}</td>
                                    <td>{{ $value->product->name }}</td>
                                    <td>{{ json_decode($value->value)->value }}</td>
                                    <td>{{ json_decode($value->value)->price_increase }}</td>
                                    <td>{{ $value->type == 0 ? 'ساده' : 'انتخابی' }}</td>
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.market.value.edit', ['categoryAttribute' => $categoryAttribute->id, 'value' => $value->id]) }}"><i
                                                class="fas fa-edit">
                                                ویرایش</i></a>

                                        <form class="d-inline"
                                            action="{{ route('admin.market.value.destroy', ['categoryAttribute' => $categoryAttribute->id, 'value' => $value->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash-alt">
                                                    حذف</i></button>
                                        </form>
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
