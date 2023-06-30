@extends('layouts.app')
@php
    $product = $store->product()->paginate(10)
@endphp


@section('content')

<div class="row">


    <div class="col-md-4">

        @if ($store->logo)
        <img class="card-img-top" src="{{asset("storage/{$store->logo}")}}" alt="Card image cap" width="50px" height=200>
       @else
       <img class="card-img-top" src="{{asset('assets/fotografia.jpg')}}" alt="Card image cap" width="180px" height=200>

        @endif

    </div>
    <div class="col-8">
        <h1 class="text-center"> {{strtoupper($store->name)}}</h1>
        <p class="text-center">{{$store->description}}</p>
        <p>contato: <span>{{$store->phone}}</span>  | <span>{{$store->mobile_phone}}</span></p>
        
    </div>
    <hr>

    <h1 class="text-center">Produtos da loja</h1>
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
 <p>Não existir produto para essa loja</p>
</div>    
@endif

<div class="pagination justify-content-center">
    <div >
        {{$product->links()}}
    </div>
</div>
 
@endsection