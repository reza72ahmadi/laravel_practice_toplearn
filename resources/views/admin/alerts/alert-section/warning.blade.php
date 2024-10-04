@if (session('alert-section-warning'))
<div class="alert alert-warning alert-dismissible">
    <button style="right: auto !important; left:0 !important" type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ session('alert-section-warning') }}</p>
</div>
@endif
