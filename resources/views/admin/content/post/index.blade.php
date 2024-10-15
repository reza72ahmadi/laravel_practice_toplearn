@extends('admin.layouts.master')

@section('head-tag')
    <title>پست ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page">پست ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>پست ها</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.post.create') }}">ایجاد پست جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm" type="text" placeholder="جستجو...">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان پست</th>
                                <th>خلاصه</th>
                                <th>وضعیت</th>
                                <th>قابلیت درج نظر</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->summary }}</td> <!-- Assuming you want to show a summary -->
                                    <td>
                                        <label>
                                            <input id="{{ $post->id }}" onchange="changeStatus({{ $post->id }})"
                                                data-url='{{ route('admin.content.post.status', $post->id) }}'
                                                type="checkbox" @if ($post->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input id="{{ $post->id }}-commentable"
                                                onchange="commentable({{ $post->id }})"
                                                data-url='{{ route('admin.content.post.commentable', $post->id) }}'
                                                type="checkbox" @if ($post->commentable === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.content.post.edit', $post->id) }}">
                                            <i class="fas fa-edit"></i> ویرایش
                                        </a>
                                        <form class="d-inline"
                                        action="{{ route('admin.content.post.destroy', $post->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm btnDlt"
                                            data-id="{{ $post->id }}">
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
            var element = $('#' + id);
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        element.prop('checked', response.checked);
                        successToast(response.checked ? 'پست با موفقیت فعال شد' : 'پست با موفقیت غیرفعال شد');
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('خطا هنگام ذخیره سازی');
                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد');
                }
            });
        }

        function deletePost(id) {
            if (confirm('آیا مطمئن هستید که می‌خواهید این پست را حذف کنید؟')) {
                $.ajax({
                    url: '{{ url('admin/content/post') }}/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.status) {
                            location.reload(); // Reload the page to see the changes
                        } else {
                            errorToast('خطا هنگام حذف پست');
                        }
                    },
                    error: function() {
                        errorToast('ارتباط برقرار نشد');
                    }
                });
            }
        }

        function commentable(id) {
            var element = $('#' + id + '-commentable');
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.commentable) {
                        element.prop('checked', response.checked);
                        successToast(response.checked ? 'پست با موفقیت فعال شد' : 'پست با موفقیت غیرفعال شد');
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('خطا هنگام ذخیره سازی');
                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد');
                }
            });
        }

        function deletePost(id) {
            if (confirm('آیا مطمئن هستید که می‌خواهید این پست را حذف کنید؟')) {
                $.ajax({
                    url: '{{ url('admin/content/post') }}/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.status) {
                            location.reload(); // Reload the page to see the changes
                        } else {
                            errorToast('خطا هنگام حذف پست');
                        }
                    },
                    error: function() {
                        errorToast('ارتباط برقرار نشد');
                    }
                });
            }
        }

        function successToast(message) {
            var successToastTags =
                '<div class="toast" data-autohide="true">' +
                '   <button type="button" class="mr-2 close fa-pull-left" data-dismiss="toast">&times;</button>' +
                '   <div class="toast-body bg-success rounded">' + message + '</div>' +
                '</div>';
            $('.toast-wrapper').append(successToastTags);
            $('.toast').last().toast('show').delay(5000).queue(function() {
                $(this).remove();
            });
        }

        function errorToast(message) {
            var errorToastTags =
                '<div class="toast" data-autohide="true">' +
                '   <button type="button" class="mr-2 close fa-pull-left" data-dismiss="toast">&times;</button>' +
                '   <div class="toast-body bg-danger rounded">' + message + '</div>' +
                '</div>';
            $('.toast-wrapper').append(errorToastTags);
            $('.toast').last().toast('show').delay(5000).queue(function() {
                $(this).remove();
            });
        }
        
    </script>
     @include('admin.alerts.sweetalert.confirmation', ['className' => 'btnDlt'])
@endsection
