@if (session('alert-section-error'))
<div class="alert alert-danger alert-dismissible">
    <button style="right: auto !important; left:0 !important" type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ session('alert-section-error') }}</p>
</div>
@endif


