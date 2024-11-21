<script src="{{ asset('admin-assets/js/jquery.js') }}"></script>
<script src="{{ asset('admin-assets/js/popper.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/grid.js') }}"></script>
<script src="{{ asset('admin-assets/js/datatable.js') }}"></script>
<script src="{{ asset('admin-assets/select/select2.min.js') }}"></script>
<script src="{{ asset('admin-assets/sweetalert/sweetalert2.min.js') }}"></script>


{{-- <script>
    let notificationDropdown = document.getElementById('header-notification-toggle');
    notificationDropdown.addEventListener('click', function() {
        $.ajax({
            type: 'POST',
            url: 'admin/notification/read-all',
            data: {
                _token: " {{ csrf_token() }}"
            },
            success: function() {
                console.log('yes')
            }
        })
    });
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let notificationDropdown = document.getElementById('header-notification-toggle');
        notificationDropdown.addEventListener('click', function() {
            // Ensure jQuery is loaded
            if (typeof $ !== 'undefined') {
                $.ajax({
                    type: 'POST',
                    url: '/admin/notification/read-all', // Ensure the correct route is used
                    data: {
                        _token: "{{ csrf_token() }}" // Inject CSRF token for security
                    },
                    success: function(response) {
                        console.log('All notifications marked as read.');
                        console.log(response); // Optionally log the server's response
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to mark notifications as read:', error);
                    }
                });
            } else {
                console.error('jQuery is not loaded.');
            }
        });
    });
</script>


{{-- @stack('scripts') --}}
