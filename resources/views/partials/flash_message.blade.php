@if(Session::has('success'))
<div class="alert alert-success" style="margin-bottom:20px;">
    <i class="icon-tick"></i>{!! Session::get('success') !!}
</div>
@endif

@if(Session::has('info'))
<div class="alert alert-info" style="margin-bottom:20px;">
    <i class="icon-info-large"></i>{!! Session::get('info') !!}
</div>
@endif

@if(Session::has('danger'))
<div class="alert alert-danger" style="margin-bottom:20px;">
    <i class="icon-warning2"></i>{!! Session::get('danger') !!}
</div>
@endif

@if(Session::has('warning'))
<div class="alert alert-warning" style="margin-bottom:20px;">
    <i class="icon-warning2"></i>{!! Session::get('warning') !!}
</div>
@endif
