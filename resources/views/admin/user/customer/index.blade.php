@extends('admin.layouts.master')

@section('head-tag')
    <title>مشتریان</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page"> مشتریان </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مشتریان
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.user.customer.create') }}">ایجاد مشتری جدید</a>
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
                                <th>ایمیل</th>
                                <th>شماره مبایل</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>فعال سازی</th>
                                <th>وضعیت</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $user->id }}-active"
                                                onchange="changeActivation({{ $user->id }})"
                                                data-url='{{ route('admin.user.customer.activation', $user->id) }}'
                                                type="checkbox" @if ($user->activation === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input id="{{ $user->id }}-status"
                                                onchange="changeStatus({{ $user->id }})"
                                                data-url='{{ route('admin.user.customer.status', $user->id) }}'
                                                type="checkbox" @if ($user->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.user.customer.edit', $user->id) }}"><i
                                                class="fas fa-edit">
                                                ویرایش</i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.user.customer.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger btn-sm btnDlt"
                                                data-id="{{ $user->id }}">
                                                <i class="fas fa-trash-alt"> حذف</i>
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
        function changeActivation(id) {
            var element = $('#' + id + '-active')
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('مشتری با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast(' مشتری با موفقیت غیرفعال شد')
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
                $('.toast').last().toast('show').delay(5000).queue(function() {
                    $(this).remove();
                });
            }

        }
    </script>
    <script>
        function changeStatus(id) {
            var element = $('#' + id + '-status')
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('وضعیت با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast(' وضعیت با موفقیت غیرفعال شد')
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
                $('.toast').last().toast('show').delay(5000).queue(function() {
                    $(this).remove();
                });
            }

        }
    </script>
    @include('admin.alerts.sweetalert.confirmation', ['className' => 'btnDlt'])
@endsection
