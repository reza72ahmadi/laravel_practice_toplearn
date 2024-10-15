@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <h1>COMMENT SHOW</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#"> نظرات</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش نظرات
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.comment.index') }}">بازگشت</a>
                </section>

                <section class="card">
                    <section class="card-header text-white bg-custom-yellow">
                        {{ $comment->user->full_name }} - {{ $comment->user->id }}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title"> مشخصات کالا:{{ $comment->commentable->title }} - کد
                            کالا:{{ $comment->commentable->id }} </h5>
                        <p class="card-text">{{ $comment->body }}</p>
                    </section>
                </section>
                @if ($comment->parent_id == null)
                    <section>
                        <form action="{{ route('admin.content.comment.answer', $comment->id) }}" method="POST">
                            @csrf
                            <section class="row">
                                <div class="col-12">
                                    <label for="">پاسخ ادمین:</label>
                                    <textarea class="form-control form-control-sm" name="body" id="" cols="30" rows="4"></textarea>
                                </div>
                            </section>
                            <section>
                                <button type="submit" class="btn btn-primary btn-sm mt-3">ثبت</button>
                            </section>
                        </form>
                    </section>
                @endif
            </section>
        </section>
    </section>
@endsection
