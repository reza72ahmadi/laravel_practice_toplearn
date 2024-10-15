@if (session('alert-section-success'))
<div class="alert alert-success alert-dismissible">
    <button style="right: auto !important; left:0 !important" type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ session('alert-section-success') }}</p>
</div>
@endif
