@extends('layouts.app')

@section('content')
<div class="card-home">
@foreach ($product as $products)
 
        <div class="card " style="width: 30rem;">
            @if ($products->productimage()->count() > 0)
            <img class="card-img-top" src="{{asset("storage/{$products->productimage()->first()->image}")}}" alt="Card image cap" width=200 height=200>
           @else
           <img class="card-img-top" src="{{asset('assets/fotografia.jpg')}}" alt="Card image cap" width=200 height=200>

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
    
@endsection