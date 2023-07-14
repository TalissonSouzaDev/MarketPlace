@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 ">
       <h2>Pedido Recebidos</h2>
       <hr>
    </div>
  <div class="col-12">
    <div id="accordion">
@foreach ($orders as $orderss)

<div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$orderss->id}}" aria-expanded="true" aria-controls="collapseOne">
         pedido n° {{$orderss->refences}}
        </button>
      </h5>
    </div>

    <div id="collapseOne{{$orderss->id}}" class="collapse @if ($orderss->id == 0) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>

    @empty
    <div class="alert alert-warning">nenhum Pedido Recebido!</div>
  </div>
    
@endforeach
   
  </div>

<div class="col-12">
    {{$orders->links()}}
</div>
</div>

  </div>

</div>
@endsection