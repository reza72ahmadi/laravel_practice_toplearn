@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش نقش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">نقش ها</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ویرایش نقش </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش نقش
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.user.role.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.user.role.update', $role->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <div class="col-md-5 col-12">
                                <label for="">عنوان نقش</label>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    value="{{ old('name', $role->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-5 col-12">
                                <label for="">توضیح نقش</label>
                                <input type="text" class="form-control form-control-sm" name="description"
                                    value="{{ old('description', $role->description) }}">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2 col-12">
                                <button class="btn btn-primary btn-sm mt-4">ثبت</button>
                            </div>
                        </section>



                        {{-- <section class="col-12">
                            <section class="row border-top mt-3 py-3">

                                @foreach ($permissions as $key => $permission)
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="permissions[]"
                                                value="{{ $permission->id }}" id="{{ $permission->id }}" checked>
                                            <label class="form-check-label mr-3 mt-1"
                                                for="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                        @error('permissions.' . $key)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </section>
                                @endforeach

                            </section>
                        </section> --}}
                </section>
                </form>
            </section>
        </section>
    </section>
    </section>
@endsection
