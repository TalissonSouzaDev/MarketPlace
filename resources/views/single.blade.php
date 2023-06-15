@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-4">
        @if ($product->productimage()->count() > 0 )
        <img class="card-img-top" src="{{asset("storage/{$product->productimage()->first()->image}")}}" alt="Card-image-top" width=800 height=400>
        <div class="row">
        @foreach ($product->productimage->all() as $photo)
       
          <div class="col-4">
            <img class="img-fluid" src="{{asset("storage/{$photo->image}")}}" alt="Card-image-top" width=200 height=200>
          </div>
            
        @endforeach
    </div>

          @else
          <img class="card-img-top" src="{{asset('assets/fotografia.jpg')}}" alt="Card-image-top" width=500 height=600>            
        @endif

    </div>
    <div class="col-8">
        <h2>{{$product->name}}</h2>
        <p>{{$product->name}}</p>
        <h3>R$ {{number_format($product->price,2,',','.')}}</h3>

        <span>Loja: {{$product->store->name}}</span>

        <a href="" class="btn btn-lg btn-danger">Comprar</a>

    </div>
</div>



<div class="row">
    <div class="col-12">
        <hr>
        {{$product->body}}
    </div>
</div>
    
@endsection