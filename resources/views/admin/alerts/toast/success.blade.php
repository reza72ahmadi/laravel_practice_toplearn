@if (session('toast-success'))
    <div class="toast" data-autohide="false">
        <button type="button" class="mr-2 close fa-pull-left" data-dismiss="toast">&times;</button>
        <div class="toast-body bg-success rounded">
            {{ session('toast-success') }}
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
@endif
