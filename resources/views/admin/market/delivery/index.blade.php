@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">روش های ارسال</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        روش های ارسال
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center border-bottom mt-3 mb-3 pb-2">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.market.delivery.create') }}">ایجاد روش ارسال
                        جدید</a>
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
                                <th>نام روش ارسال</th>
                                <th>هزینه ارسال</th>
                                <th>زمان ارسال</th>
                                <th>وضعیت</th>
                                <th class="width-16-rem text-center"><i class="fas fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveries as $delivery)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $delivery->name }}</td>
                                    <td>{{ $delivery->amount }}</td>
                                    <td>{{ $delivery->delivery_time . ' ' . $delivery->delivery_time_unit }}</td>
                                    <td>
                                        <label>
                                            <input type="checkbox" id="{{ $delivery->id }}"
                                                onchange="changeStatus({{ $delivery->id }})"
                                                data-url="{{ route('admin.market.delivery.status', $delivery->id) }}"
                                                @if ($delivery->status === 1) @checked(true) @endif>
                                        </label>
                                        {{-- <label for="">
                                            <input id="{{ $delivery->id }}" onchange="changeStatus({{ $delivery->id }})"
                                                data-url='{{ route('admin.market.delivery.status', $delivery->id) }}'
                                                type="checkbox"
                                                @if ($delivery->status === 1) @checked(true) @endif>
                                        </label> --}}

                                    </td>
                                    <td class="max-width-16-rem text-left">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.market.delivery.edit', $delivery->id) }}"><i class="fas fa-edit">
                                                ویرایش</i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.delivery.destroy', $delivery->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash-alt"> حذف</i></button>
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
                    if (response.reza) {
                        // ---
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('پرسش با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast(' پرسش با موفقیت غیرفعال شد')
                        }
                        // -----
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
                var ghghg =
                    '<div class="toast" data-autohide="true">\n' +
                    '   <button type="button" class="mr-2 close fa-pull-left" data-dismiss="toast">&times;</button>\n' +
                    '   <div class="toast-body bg-success rounded">\n' + message + '</div>\n' +
                    '</div>\n';

                $('.toast-wrapper').append(ghghg);

                $('.toast').last().toast('show').delay(50000).queue(function() {
                    $(this).remove();
                });
            }

        }
    </script>
    @include('admin.alerts.sweetalert.confirmation', ['className' => 'btnDlt'])
@endsection
