@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>دسته بندی</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.category.create') }}">ایجاد دسته بندی </a>
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
                                <th>نام دسته بندی</th>
                                <th>توضیحات</th>
                                <th>اسلاگ</th>
                                <th>تصویر</th>
                                <th>وضعیت</th>
                                <th>تگ ها</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postCategories as $No => $postCategory)
                                <tr id="postCategory{{ $postCategory->id }}">
                                    <th>{{ $No + 1 }}</th>
                                    <td>{{ $postCategory->name }}</td>
                                    <td>{{ $postCategory->description }}</td>
                                    <td>{{ $postCategory->slug }}</td>
                                    <td>
                                        <img src="{{ asset($postCategory->image) }}" alt="">
                                    </td>
                                    <td>
                                        <label for="">
                                            <input id="{{ $postCategory->id }}"
                                                onchange="changeStatus({{ $postCategory->id }})"
                                                data-url='{{ route('admin.content.category.status', $postCategory->id) }}'
                                                type="checkbox" @if ($postCategory->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td>{{ $postCategory->tags }}</td>
                                    <td class="max-width-16-rem text-left">
                                        <a
                                            class="btn btn-primary btn-sm"href="{{ route('admin.content.category.edit', $postCategory->id) }}">
                                            <iclass="fas fa-edit>ویرایش</i>
                                    </a>
                                            <form class="d-inline"
                                            action="{{ route('admin.content.category.destroy', $postCategory->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger btn-sm btnDlt"
                                                data-id="{{ $postCategory->id }}">
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
    <script>
        function changeStatus(id) {
            var element = $('#' + id)
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked)
                            element.prop('checked', true);
                        else
                            element.prop('checked', false);
                    } else {
                        element.prop('checked', elementValue);
                    }
                }
            })
        }
        //------------------------------------------------------------------
        $(document).on('click', '.btnDlt', function() {
            var postId = $(this).data('id');
            var url = '{{ route('admin.content.category.destroy', '') }}/' + postId;
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    if (response.status) {
                        $('#postCategory' + postId).remove();
                    }
                },
            });
        });
    </script>
@endsection
