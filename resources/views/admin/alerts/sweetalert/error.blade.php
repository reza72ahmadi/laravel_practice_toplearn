@if (session('swal-error'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'عملیات با موفقیت انجام شد',
                text: '{{ session('swal-error') }}', 
                icon: 'error',
                confirmButtonText: 'باشه'
            });
        });
    </script>
@endif