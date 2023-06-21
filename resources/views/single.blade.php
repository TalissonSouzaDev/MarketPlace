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
    <div class="">
        <h2>{{$product->name}}</h2>
        <p>{{$product->name}}</p>
        <h3>R$ {{number_format($product->price,2,',','.')}}</h3>

        <span>Loja: {{$product->store->name}}</span>
    </div>

        <div class="produc-add">
            <form action="{{route('cart.add')}}" method="post">
                @csrf
                <input type="hidden" name="product[id]" value="{{$product->id}}">
                <input type="hidden" name="product[name]" value="{{$product->name}}">
                <input type="hidden" name="product[price]" value="{{$product->price}}">
                <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                
                <div class="form-group">
                    <label for="">Quantidade</label>
                    <input type="number" name="product[amount]" class="form-control" value="1" style="width: 100px">
                </div>
                <button type="submit" class="btn btn-danger">Comprar</button>
            </form>
        </div>

    </div>
</div>



<div class="row">
    <div class="col-12">
        <hr>
        {{$product->body}}
    </div>
</div>
    
@endsection