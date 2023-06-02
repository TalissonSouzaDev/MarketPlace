@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('alert.index')
            <div class="card">
                
                <div class="card-header">
                 
                    <a href="{{route('product.create')}}" class="btn btn-success">Criar Novo Produto <i class="far fa-plus"></i></a>
                        
                   

                </div>

                <div class="card-body">
                  

                    @if (!empty($product))
                   <table class="table table-condensed">
                    <thead>
                       <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Preço</th> 
                        <th>Ação</th>
                        
                       </tr>                    
                    </thead>

                    <tbody>
                        <tr>
                            @foreach ($product as $products)
                            <td><img src="{{asset("storage/{$products->image}")}}" alt="{{$products->name}}"></td>
                            <td>{{$products->name}}</td>
                            <td>R$ {{number_format($products->price, 2 ,",",'.')}}</td>
                            <td class="form-inline">
                                <a href="#" class="btn btn-secondary">Categoria</a>
                                 <a  href="{{route('product.show',$products->id)}}" class="btn btn-info">View</a>
                                 <a  href="{{route('product.edit',$products->id)}}" class="btn btn-warning">Edita</a>
                            </td>
                            

                                
                            @endforeach
                        </tr>
                    </tbody>
                   </table>

                    </div>

                    @else
                    <h4> Humm... , Não Existir produto Cadastrado. </h4>
                        
                    @endif
            
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Modal Delete --}}

<!-- The Modal -->
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
        
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
   
        </div>
  
      </div>
    </div>
  </div>
@endsection