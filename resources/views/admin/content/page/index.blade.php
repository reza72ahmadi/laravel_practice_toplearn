@extends('admin.layouts.master')

@section('head-tag')
    <title>پیچ ساز</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page">پیچ ساز</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پیچ ساز
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.page.create') }}">ایجاد پیچ جدید</a>
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
                                <th>عنوان</th>
                                <th>آدرس پیج</th>
                                <th>وضعیت</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $key => $page)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->body }}</td>
                                    <td>
                                        <label for="">
                                            <input id="{{ $page->id }}" onchange="changeStatus({{ $page->id }})"
                                                data-url='{{ route('admin.content.page.status', $page->id) }}'
                                                type="checkbox" @if ($page->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.content.page.edit', $page->id) }}"><i class="fas fa-edit">
                                                ویرایش</i></a>
                                        <form class="d-inline" action="{{ route('admin.content.page.destroy', $page->id) }}"
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
                            successToast('پیچ با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast(' پیچ با موفقیت غیرفعال شد')
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
