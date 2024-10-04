<script>
    $(document).ready(function() {
        var className = '{{ $className }}';
        var element = $('.' + className);

        element.on('click', function(e) {
            e.preventDefault();
            const swalWithBootstrapButton = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger',
                },
                buttonsStyling: false
            });
            swalWithBootstrapButton.fire({
                title: "مطمئن هستید?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "بله!"
            }).then((result) => {
                if (result.value == true) {
                    $(this).parent().submit();
                }
            });
        });
    });

    // Swal.fire({
    //     title: "Are you sure?",
    //     text: "You won't be able to revert this!",
    //     icon: "warning",
    //     showCancelButton: true,
    //     confirmButtonColor: "#3085d6",
    //     cancelButtonColor: "#d33",
    //     confirmButtonText: "Yes, delete it!"
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         Swal.fire({
    //             title: "Deleted!",
    //             text: "Your file has been deleted.",
    //             icon: "success"
    //         });
    //     }
    // });
</script>
