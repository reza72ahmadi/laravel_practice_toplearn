@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <h1>COMMENT SHOW</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش تکت ها</a></li>
            <li class="breadcrumb-item"><a href="#"> تکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش تکت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش تکت ها
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.ticket.index') }}">بازگشت</a>
                </section>

                <section class="card">
                    <section class="card-header text-white bg-custom-yellow">
                        {{ $ticket->admin->user->first_name . ' ' . $ticket->admin->user->last_name }} - {{ $ticket->id }}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">موضوع : {{ $ticket->subject }}</h5>
                        <p class="card-text">{{ $ticket->description }}</p>
                    </section>
                </section>

                <section>
                    <form action="{{ route('admin.ticket.answer', $ticket->id) }}" method="POST">
                        @csrf
                        <section class="row">
                            <div class="col-12">
                                <label for="">پاسخ تیکت:</label>
                                <textarea class="form-control form-control-sm" name="description" cols="30" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
