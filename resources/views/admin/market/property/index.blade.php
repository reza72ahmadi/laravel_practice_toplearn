@extends('admin.layouts.master')

@section('head-tag')
    <title>فارم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        فرم کالا
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.property.create') }}">ایجادفرم جدید</a>
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
                                <th>نام</th>
                                <th>واحد اندازه گیری</th>
                                <th>دسته والد</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category_attribute as $categoryAttribute)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $categoryAttribute->name }}</td>
                                    <td>{{ $categoryAttribute->unit }}</td>
                                    <td>{{ $categoryAttribute->category->name }}</td>
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('admin.market.value.index', $categoryAttribute->id) }}"><i
                                                class="fas fa-edit">ویژگی</i></a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.market.property.edit', $categoryAttribute->id) }}"><i
                                                class="fas fa-edit">
                                                ویرایش</i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.property.destroy', $categoryAttribute->id) }}"
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
