@extends('admin.layouts.master')

@section('head-tag')
    <title>نقش ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نقش ها </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نقش ها
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.user.role.create') }}">ایجاد نقش جدید</a>
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
                                <th>نام نقش</th>
                                <th>توضیحات</th>
                                <th>دسترسی</th>
                                {{-- <th>وضعیت</th> --}}
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        @if (empty($role->permissions()->get()->toArray()))
                                            <span>not found</span>
                                        @else
                                            @foreach ($role->permissions as $permission)
                                                {{ $permission->name }}<br>
                                            @endforeach
                                        @endif

                                    </td>
                                    {{-- <td>
                                        <label>
                                            <input id="{{ $role->id }}" onchange="changeStatus({{ $role->id }})"
                                                data-url='{{ route('admin.user.role.status', $role->id) }}'
                                                type="checkbox"@if ($role->status === 1) checked @endif>
                                        </label>
                                    </td> --}}
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('admin.user.role.permission-form', $role->id) }}"><i
                                                class="fas fa-user-graduate">
                                                دسترسی ها</i></a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.user.role.edit', $role->id) }}"><i class="fas fa-edit">
                                                ویرایش</i></a>

                                        <form class="d-inline" action="{{ route('admin.user.role.destroy', $role->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm btnDlt"
                                                data-id="{{ $role->id }}">
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
{{-- @section('script')
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
    @include('admin.alerts.sweetalert.confirmation', ['className' => 'btnDlt'])
@endsection --}}
