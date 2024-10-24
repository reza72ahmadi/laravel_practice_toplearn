@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">برندها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>برند</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.brand.create') }}">ایجاد برند </a>
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
                                <th>نام فارسی برند</th>
                                <th>نام اصلی برند</th>
                                <th>لوگو</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $key => $brand)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $brand->persian_name }}</td>
                                    <td>{{ $brand->original_name }}</td>

                                    <td><img src="{{ asset('storage/' . $brand->logo) }}" alt=""
                                            style="width: 60px; height: auto; border-radius: 50%;"></td>
                                    <td class="max-width-16-rem text-left">

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.market.brand.edit', $brand->id) }}"><i
                                                class="fas fa-edit">
                                                ویرایش</i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.brand.destroy', $brand->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
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
