@extends('admin.layouts.master')

@section('head-tag')
    <title>بنرها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page">بنرها</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>بنرها</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.content.banner.create') }}">ایجادبنر </a>
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
                                <th>آدرس</th>
                                <th>تصویر</th>
                                <th>وضعیت</th>
                                <th>مکان</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $No => $banner)
                                <tr>
                                    <th>{{ $No + 1 }}</th>
                                    <td>{{ $banner->title }}</td>
                                    <td>{{ $banner->url }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $banner->image) }}" alt=""
                                            style="width: 60px; height: auto; border-radius: 50%;">
                                    </td>
                                    <td>
                                        <label for="">
                                            <input id="{{ $banner->id }}" onchange="changeStatus({{ $banner->id }})"
                                                data-url='{{ route('admin.content.banner.status', $banner->id) }}'
                                                type="checkbox" @if ($banner->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td>{{ $banner->position }}</td>

                                    <td class="max-width-16-rem text-left">
                                        <form class="d-inline"
                                            action="{{ route('admin.content.banner.destroy', $banner->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <a
                                                class="btn btn-primary btn-sm"href="{{ route('admin.content.banner.edit', $banner->id) }}">
                                                <iclass="fas fa-edit>ویرایش</i>
                                        </a>
                                            <button type="button"
                                                class="btn btn-danger btn-sm btnDlt"
                                                data-id="{{ $banner->id }}">
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
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیرفعال شد')
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
