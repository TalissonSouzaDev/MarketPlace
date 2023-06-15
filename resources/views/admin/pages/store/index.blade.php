@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('alert.index')
            <div class="card">
                
                <div class="card-header">
                    @empty (!$store != '')
                    <i><strong>Empresa:</strong> {{$store->name}}</i>
                    

                    @else
                    <a href="{{route('store.create')}}" class="btn btn-success">Criar Minha Empresa <i class="far fa-plus"></i></a>
                        
                    @endif

                </div>

                <div class="card-body">
                  

                    @if ($store != '')
                    <ul>
                        <li><strong>Proprietario:</strong> {{$store->user->name}}</li>
                        <li><strong>E-mail: </strong>{{$store->user->email}}</li>
                        <li><strong>Empresa:</strong> {{$store->name}}</li>
                        <li><strong>Telefone:</strong> {{$store->phone}}</li>
                        <li><strong>Celular: <i class="fab fa-whatsapp"></i> :</strong> {{$store->mobile_phone}}</li>
                        <li><strong>Quantidade de produtos:</strong> {{count($store->product)}}</li>
                        <li><strong>Logo:</strong><br> <img src="{{asset("storage/{$store->logo}")}}" width=150 height=150></li>
                        <li><strong>Sobre a Empresa:</strong> {{$store->description}}</li>    
                    </ul>

                    <div class="form-inline">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                            Excluir <i class="fas fa-trash-alt"></i>
                          </button>

                        <a href="{{route('store.edit',$store->uuid_store)}}" class="btn btn-warning"> Edita Empresa <i class="fas fa-pencil"></i></a>

                    </div>

                    @else
                    <h4> Humm... , parace que você ainda não tem uma empresa. </h4>
                        
                    @endif
            
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Modal Delete --}}

<!-- The Modal -->
@empty(!$store)
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Deseja Realmente Excluir Sua Empresa</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <ul>
                <li><strong>Proprietario:</strong> {{$store->user->name}}</li>
            <li><strong>E-mail: </strong>{{$store->user->email}}</li>
            <li><strong>Empresa:</strong> {{$store->name}}</li>
            <li><strong>Telefone:</strong> {{$store->phone}}</li>
            <li><strong>Celular <i class="fab fa-whatsapp"></i> :</strong> {{$store->mobile_phone}}</li>
            </ul>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
         <form action="{{route('store.destroy',[$store->uuid_store])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Quero Excluir Minha Empresa</button>
         </form>
        </div>
  
      </div>
    </div>
  </div>
    
@endempty
@endsection