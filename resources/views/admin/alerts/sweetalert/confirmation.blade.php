<script>
    $(document).ready(function() {
        var className = '{{ $className }}';
        var element = $('.' + className);

        element.on('click', function(e) {
            e.preventDefault();
            const swalWithBootstrapButton = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-1',
                    cancelButton: 'btn btn-danger',
                },
                buttonsStyling: false
            });
            swalWithBootstrapButton.fire({
                title: "مطمئن هستید?",
                icon: "warning",
                showCancelButton: true ,
                confirmButtonText: " بله",
                cancelButtonText: "نخیر",
            }).then((result) => {
                if (result.value == true) {
                    $(this).parent().submit();
                }
            });
        });
    });
</script>
