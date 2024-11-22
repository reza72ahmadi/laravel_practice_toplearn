<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head-tag')
</head>

<body>
    @include('customer.layouts.head-tag')

    <main id="main-body-one-col" class="main-body">

        @yield('content')

    </main>

    @include('customer.layouts.script')
    @yield('script')
</body>

</html>
