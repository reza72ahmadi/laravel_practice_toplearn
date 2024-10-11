@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش مینو</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item"><a href="#">منو</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش منو</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش منو
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.menu.index') }}">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('admin.content.menu.update', $menu->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <div class="col-md-6 col-12">
                                <label for="">عنوان منو</label>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    value="{{ old('name', $menu->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="">منوی والد</label>
                                <Select name="parent_id" class="form-control form-control-sm">
                                    <option value="">مینوی اصلی</option>
                                    @foreach ($parent_menus as $parent_menu)
                                        <option value="{{ $parent_menu->id }}"

                                            @if (old('parent_id', $menu->parent_id) == $parent_menu->id) selected @endif>
                                            {{ $parent_menu->name }}</option>
                                    @endforeach
                                </Select>
                                @error('parent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <label for=""> url</label>
                                <input type="text" class="form-control form-control-sm" name="url"
                                    value="{{ old('url', $menu->url) }}">
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="status">وضعیت</label>
                                <Select class="form-control form-control-sm" name="status" id="status">
                                    <option value="0" @if (old('status', $menu->status) === 0) selected @endif>غیر فعال
                                        </ption>
                                    <option value="1" @if (old('status', $menu->status) === 1) selected @endif>فعال</option>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </Select>
                            </div>
                        </section>
                        <section>
                            <button class="btn btn-primary btn-sm mt-3">ثبت</button>
                        </section>
                    </form>

                </section>
            </section>
        </section>
    </section>
@endsection