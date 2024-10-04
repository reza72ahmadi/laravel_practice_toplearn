@if (session('alert-section-info'))
<div class="alert alert-info alert-dismissible">
    <button style="right: auto !important; left:0 !important" type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ session('alert-section-info') }}</p>
</div>
@endif
