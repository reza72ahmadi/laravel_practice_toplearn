@extends('admin.layouts.master')

@section('head-tag')
    <title>پست ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page">پست ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پست ها
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.post.create') }}">ایجادپست جدید</a>
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
                                <th>عنوان پست</th>
                                <th>حلاصه</th>
                                
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <th>{{ $post->title }}</th>
                                    <th>{{ $post->postCategory->name }}</th>
                                    {{-- <th>{{ $post->summary }}</th>
                                    <th>{{ $post->body }}</th>
                                    <th>{{ $post->image }}</th>
                                    <th>{{ $post->status }}</th> --}}
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-primary btn-sm" href=""><i class="fas fa-edit">
                                                ویرایش</i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt">
                                                حذف</i></button>
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
