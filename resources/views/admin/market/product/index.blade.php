@extends('admin.layouts.master')

@section('head-tag')
    <title>کالاها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">کالاها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کالاها
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.product.create') }}">ایجاد کالای جدید
                    </a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm" type="text" name="" id=""
                            placeholder="جستجو...">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" style="height: 160px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویرکالا</th>
                                <th>قیمت</th>
                                <th>دسته</th>
                                <th class="width-8-rem text-center"><i class="fas fa-cogs"></i> عملیات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ asset('storage/' . $product->image) }}" alt=""
                                            style="width: 60px; height: auto; border-radius: 50%;"></td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td class="max-width-8-rem text-left">
                                        <div class="dropdown">
                                            <a id="dropdownMenuLink{{ $product->id }}" data-toggle="dropdown"
                                                class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                                href="#" aria-expanded="false">
                                                <i class="fas fa-tools"></i> عملیات
                                            </a>
                                            <div class="dropdown-menu"
                                                aria-labelledby="dropdownMenuLink{{ $product->id }}">
                                                <a class="dropdown-item text-right"
                                                    href="{{ route('admin.market.gallery.index', $product->id) }}">
                                                    <i class="fas fa-images"></i> گالری
                                                </a>
                                                <a class="dropdown-item text-right"
                                                    href="{{ route('admin.market.product.edit', $product->id) }}">
                                                    <i class="fas fa-edit"></i> ویرایش
                                                </a>
                                                <a class="dropdown-item text-right"
                                                    href="{{ route('admin.market.color.index', $product->id) }}">
                                                    <i class="fas fa-list-ul"></i> رنگ کالا
                                                </a>
                                                <form action="{{ route('admin.market.product.destroy', $product->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-right">
                                                        <i class="fas fa-window-close"></i>حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>      
                <div class="pagination-links">
                    {{ $products->links() }}
                </div>
            </section>
        </section>
    </section>
@endsection
