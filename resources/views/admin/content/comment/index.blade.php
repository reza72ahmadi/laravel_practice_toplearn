@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد نظر
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm disabled" href="">ایجاد نظر</a>
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
                                <th>نظر</th>
                                <th>پاسخ به</th>
                                <th>نویسنده نظر</th>
                                <th>کد پست</th>
                                <th>پست</th>
                                <th>وضعیت</th>
                                <th>وضعیت کامنت</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $key => $comment)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $comment->body }}</td>
                                    <td>{{ $comment->parent_id ? Str::limit($comment->parent->body, 10) : '' }}</td>
                                    <td>{{ $comment->user->full_name }}</td>
                                    <td>{{ $comment->commentable_id }}</td>
                                    <td>{{ $comment->commentable->title }}</td>
                                    <td>{{ $comment->approved == 1 ? 'تایید شده' : 'تایید ناشده' }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $comment->id }}" onchange="changeStatus({{ $comment->id }})"
                                                data-url='{{ route('admin.content.comment.status', $comment->id) }}'
                                                type="checkbox" @if ($comment->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.content.comment.show', $comment->id) }}">
                                            <i class="fas fa-eye"></i> نمایش
                                        </a>
                                        @if ($comment->approved == 1)
                                            <a href="{{ route('admin.content.comment.approved', $comment->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-clock"></i> عدم تائید
                                            </a>
                                        @else
                                            <a href="{{ route('admin.content.comment.approved', $comment->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i> تائید
                                            </a>
                                        @endif
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
                        // ------------
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('نظر بندی با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('نظر بندی با موفقیت غیرفعال شد')
                        }
                        // ---------
                    } 

                    else {
                        element.prop('checked', elementValue);
                        errorToast('خطا هنگام ذخیره سازی')
                    }
                },

                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            
            function successToast(message) {
                var successToastTags =
                    '<div class="toast" data-autohide="true">\n' +
                    '   <button type="button" class="mr-2 close fa-pull-left" data-dismiss="toast">&times;</button>\n' +
                    '   <div class="toast-body bg-success rounded">\n' + message + '</div>\n' +
                    '</div>\n';

                $('.toast-wrapper').append(successToastTags);
                $('.toast').last().toast('show').delay(50000).queue(function() {
                    $(this).remove();
                });
            }

        }
    </script>
    @include('admin.alerts.sweetalert.confirmation', ['className' => 'btnDlt'])
@endsection
