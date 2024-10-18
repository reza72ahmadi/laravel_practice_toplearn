@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش اولویت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">تکت</a></li>
            <li class="breadcrumb-item"><a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش اولویت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش اولویت
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.ticket.priority.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.ticket.priority.update', $ticketpriority->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">

                            <div class="col-md-6 col-12">
                                <label for="name">اولویت</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name"
                                    value="{{ old('name', $ticketpriority->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <Select class="form-control form-control-sm" name="status" id="status">
                                    <option value="0" @if (old('status', $ticketpriority->status) === 0) selected @endif>غیر فعال
                                        </ption>
                                    <option value="1" @if (old('status', $ticketpriority->status) === 1) selected @endif>فعال</option>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </Select>
                            </div>
                        </section>
                        <section>
                            <button type="submit" class="btn btn-primary btn-sm mt-3">ثبت</button>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
