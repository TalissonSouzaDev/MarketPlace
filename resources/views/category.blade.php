@extends('layouts.app')
@php
    $product = $category->product()->paginate(10)
@endphp


@section('content')

<div class="row">
    <div class="col-12">
        <h1 class="text-center">{{strtoupper($category->name)}}</h1>
        
    </div>
    <hr>
</div>

<br>
<br>
<br>
@if (count($product) > 0 )
<div class="card-home">
    @foreach ($product  as $products)
     
            <div class="card " style="width: 30rem;">
                @if ($products->productimage()->count() > 0)
                <img class="card-img-top" src="{{asset("storage/{$products->productimage()->first()->image}")}}" alt="Card image cap" width=200 height=200>
               @else
               <img class="card-img-top" src="{{asset('assets/fotografia.jpg')}}" alt="Card image cap" width="180px" height=200>
    
                @endif
               
                <div class="card-body">
                  <h5 class="card-title">{{$products->name}}</h5>
                  <p class="card-text">Preço:R$ {{number_format($products->price,2,',','.')}}</p>
                  <p class="card-text">{{$products->description}}.</p>
                  <a href="{{route('produto.slug',$products->slug)}}" class="btn btn-primary">Ver Produto</a>
                </div>
        </div>
        
    @endforeach
    </div>
@else
<div class="alert alert-warning">
 <p>Não existir produto para essa Categoria</p>
</div>    
@endif

<div class="pagination justify-content-center">
    <div >
        {{$product->links()}}
    </div>
</div>
 
@endsection