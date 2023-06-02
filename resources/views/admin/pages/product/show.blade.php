@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Produto:</b></div>

                <div class="card-body">

                    <ul>
                        <h4>Produtos</h4>
                        <li><b>Nome:</b> {{$product->name}}</li>
                        <li><b>Preço:</b> R$ {{number_format($product->price,2,',','.')}}</li>
                        <li><b>Imagem</b> <img src="{{asset("storage/{$product->image}")}}" alt="{{$product->image}}" ></li>
                        <li><b>Descrição</b> {{$product->description}}</li>
                    </ul>

                    
                    <div class="form inline">
                        <a href="{{route('product.index')}}" class="btn btn-info"> <i class="fas fa-long-arrow-left"></i> Volta</a>
                        <button type="submit" class="btn btn-danger" onclick="document.getElementById('formdelproduct').submit()">Deleta</button>
                        <form action="{{route('product.destroy',$product->id)}}" id="formdelproduct" method="post">
                            @csrf
                            @method('DELETE')
                        
                        </form>
                    </div>
                  
                </div>

            </div>
        </div>
    </div>
</div>
@endsection