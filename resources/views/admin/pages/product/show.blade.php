@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Produto: {{$product->name}}</b></div>

                <div class="card-body">

                    <ul>
                        <h4>Produto: {{$product->name}}</h4>
                        <li><b>Nome:</b> {{$product->name}}</li>
                        <li><b>Preço:</b> R$ {{number_format($product->price,2,',','.')}}</li>
                        <li><b>Imagem</b> <img src="{{asset("storage/{$product->image}")}}" alt="{{$product->image}}" ></li>
                        <li><b>Descrição:</b> {{$product->description}}</li>
                    </ul>

                    <ul>
                        <div class="row">
                        <h4 class="card-title">imagens do produtos:</h4>
                        @foreach ($product->productimage->all() as $image)
                        <div class="col-3">
                         <img src="{{asset("storage/{$image->image}")}}" width=150 height=150>
                        </div>
 
                            
                        @endforeach
                        </div>
                    </ul>

                    <ul>
                        <h4>Categoria</h4>
                      @foreach ($product->categorie->all() as $category)
                      <li>{{$category->name}}</li>
                          
                      @endforeach
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