@extends('admin.layouts.master')

@section('head-tag')
    <title>کوپن تخفیف</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">کوپن تخیف</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>کوپن تخفیف</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.discount.copan.create') }}">ایجاد کوپن تخفیف
                    </a>
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
                                <td>کدکوپن</td>
                                <td>میزان تخفیف</td>
                                <td>سقف تخفیف</td>
                                <td>نوع تخفیف</td>
                                <td>نوع کوپن</td>
                                <td>تاریخ شروع</td>
                                <td>تاریخ پایان</td>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($copans) > 0)
                                @foreach ($copans as $copan)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $copan->code }}</td>
                                        <td>{{ $copan->amount }}</td>
                                        <td>{{ $copan->discount_ceiling ?? '0' }}</td>
                                        <td>{{ $copan->amount_type == 0 ? 'درصدی' : 'عددی' }}</td>
                                        <td>{{ $copan->type == 0 ? 'عمومی' : 'خصوصی' }}</td>
                                        <td>{{ JalaliDate($copan->start_date, 'Y/m/d') }}</td>
                                        <td>{{ JalaliDate($copan->end_date, 'Y/m/d') }}</td>
                                        <td class="max-width-16-rem text-left">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.market.discount.copan.edit', $copan->id) }}"><i
                                                    class="fas fa-edit">
                                                    ویرایش</i></a>
                                            <form class="d-inline" action="{{ route('admin.market.discount.copan.delete', $copan->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash-alt">
                                                        حذف</i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
