@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">گارانتی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>گارانتی</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.guarantee.create', $product->id) }}">ایجاد
                        گارانتی </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.product.index') }}"> بازگشت </a>
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
                                <th>نام گارانتی</th>
                                <th>افزایش قیمت</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->guarantees as $guarantee)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $guarantee->name }}</td>
                                    <td>{{ $guarantee->price_increase }}</td>
                                    {{-- <td class="fa-pull-left">
                                        <form
                                            action="{{ route('admin.market.guarantee.destroy', ['product' => $product->id, 'guarantee' => $guarantee->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm btnDlt">
                                                <i class="fas fa-trash-alt"></i> حذف
                                            </button>
                                        </form>
                                    </td> --}}
                                    <td class="fa-pull-left">
                                        <form
                                            action="{{ route('admin.market.guarantee.destroy', ['product' => $product->id, 'guarantee' => $guarantee->id]) }}"
                                            method="POST"
                                            {{-- onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این گارانتی را حذف کنید؟');" --}}
                                            >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btnDlt">
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
@section('script')
    @include('admin.alerts.sweetalert.confirmation', ['className' => 'btnDlt'])
@endsection
