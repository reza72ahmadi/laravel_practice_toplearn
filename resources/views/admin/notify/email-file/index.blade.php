@extends('admin.layouts.master')

@section('head-tag')
    <title>فایلهای اطلاعیه ایمیلی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item active" aria-current="page">اطلاعیه ایمیلی</li>
            <li class="breadcrumb-item active" aria-current="page">فایلهای اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        فایلهای اطلاعیه ایملی
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.notify.email-file.create', $email->id) }}">ایجاد
                        فایل اطلاعیه
                        ایمیلی</a>
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
                                <th>عنوان ایمیل</th>
                                <th>سایز فایل</th>
                                <th>نوع فایل</th>
                                <th>وضعیت</th>
                                <th class="width-20-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($email->files as $key => $file)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $email->subject }}</td>
                                    <td>{{ $file->file_size }}</td>
                                    <td>{{ $file->file_type }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $file->id }}" onchange="changeStatus({{ $file->id }})"
                                                data-url='{{ route('admin.notify.email-file.status', $file->id) }}'
                                                type="checkbox" @if ($file->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td class="max-width-20-rem text-left">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.notify.email-file.edit', $file->id) }}"><i
                                                class="fas fa-edit">
                                                ویرایش</i></a>

                                        <form class="d-inline"
                                            action="{{ route('admin.notify.email-file.destroy', $file->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash-alt">
                                                    حذف</i></button>
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
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('ایمیل با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast(' ایمیل با موفقیت غیرفعال شد')
                        }
                    } else {
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
