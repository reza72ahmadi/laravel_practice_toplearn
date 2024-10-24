@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>دسته بندی</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.category.create') }}">ایجاد دسته بندی </a>
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
                                <th>نام دسته بندی</th>
                                <th>توضیحات دسته بندی</th>
                                <th>دسته والد</th>
                                <th>وضعیت</th>
                                <th>عکس</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productsCategories as $productsCategory)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $productsCategory->name }}</td>
                                    <td>{{ $productsCategory->description }}</td>
                                    <td> {{ $productsCategory->parent_id ? $productsCategory->parent->name : 'دسته اصلی' }}
                                    </td>
                                    <td>{{ $productsCategory->status }}</td>
                                    <td><img src="{{ asset('storage/' . $productsCategory->image) }}" alt="Profile Image"
                                            style="width: 60px; height: auto; border-radius: 50%;"></td>

                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.market.category.edit', $productsCategory->id) }}"><i
                                                class="fas fa-edit">
                                                ویرایش</i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.category.destroy', $productsCategory->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete ')

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
