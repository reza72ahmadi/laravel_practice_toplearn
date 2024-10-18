@extends('admin.layouts.master')

@section('head-tag')
    <title>ادمین تکت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page">ادمین تکت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ادمین تکت
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm disabled" href="#">ایجاد ادمین تکت جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm" type="text" placeholder="جستجو...">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام ادمین</th>
                                <th>ایمیل ادمین</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $key => $admin)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $admin->first_name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-sm {{ $admin->ticketAdmin === null ? 'btn-success' : 'btn-danger' }}"
                                            href="{{ route('admin.ticket.admin.set', $admin->id) }}">
                                            <i class="fas fa-check"></i>
                                            {{ $admin->ticketAdmin === null ? 'اضافه' : 'حذف' }}
                                        </a>
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
