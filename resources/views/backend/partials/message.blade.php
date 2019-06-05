@if(session('message'))
<div class="alert alert-info">
    {{ session('message') }}
</div>
@elseif(session('error-message'))
<div class="alert alert-danger">
    {{ session('message') }}
</div>
@endif