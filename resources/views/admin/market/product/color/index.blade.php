@extends('admin.layouts.master')

@section('head-tag')
    <title>رنگها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">رنگها</li>
        </ol>
    </nav>

    {{-- {{dd($product->colors)}} --}}

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        رنگها
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.color.create', $product->id) }}">ایجاد رنگ
                        جدید
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
                                <th>رنگ کالا</th>
                                <th>افزایش قیمت</th>
                                <th class="width-8-rem text-center"><i class="fas fa-cogs"></i> عملیات </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($product->colors as $color)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $color->color_name }}</td>
                                    <td>{{ $color->price_increase }}</td>
                                    <td>
                                        <form
                                            action="{{ route('admin.market.color.destroy', ['product' => $product->id, 'productColor' => $color->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> حذف
                                            </button>
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
