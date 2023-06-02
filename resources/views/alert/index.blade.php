@if (session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <p>{{session('success')}}</p>
  </div>
    
@endif


@if (session('warning'))
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <p>{{session('warning')}}</p>
  </div>
    
@endif

@if ($errors->any())

@foreach ($errors->all() as $erros)
<div class="alert alert-info alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
<p>{{$erros}}</p>
</div>
@endforeach
    
@endif