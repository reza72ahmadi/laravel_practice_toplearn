@extends('admin.layouts.master')

@section('head-tag')
    <title>جزئیات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">جزئیات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>جزئیات</h5>
                </section>


                <section class="table-responsive">
                    <table class="table table-striped table-hover" style="height: 160px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام محصول</th>
                                <th>در صد فروش فوق العاده</th>
                                <th>مبلغ فروش فوق العاده</th>
                                <th>تعداد</th>
                                <th>جمع قیمت محصول</th>
                                <th>مبلغ نهایی</th>
                                <th>رنگ</th>
                                <th>گارانتی</th>
                                <th>ویژگی</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item->singleProduct->name ?? '-' }}</td>
                                    <td>{{ $item->amazingSale->percentage ?? '-' }}</td>
                                    <td>{{ $item->amazing_sale_discount_amount ?? '-' }}</td>
                                    <td>{{ $item->number ?? '-' }}</td>
                                    <td>{{ $item->final_product_price ?? '-' }}</td>
                                    <td>{{ $item->final_total_price ?? '-' }}</td>
                                    <td>{{ $item->productColor->color_name ?? '-' }}</td>
                                    <td>{{ $item->guarantee->name ?? '-' }}</td>
                                    <td>
                                        @if($item->orderItemAttributes)
                                        @foreach ($item->orderItemAttributes as $attribute)
                                            {{ $attribute->categoryAttribute->name ?? '-' }} :
                                            {{ $attribute->categoryAttributeValue->value ?? '-' }}
                                        @endforeach
                                        @endif
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
