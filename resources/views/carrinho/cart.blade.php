@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-12">
    <h2> Carrinho de Compras</h2>
    <hr>
</div>

<div class="col-12">
    @if (!empty($cart))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
                <th>Acão</th>
            </tr>
        </thead>

        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($cart as $c)
            <tr>
                <td>{{$c['name']}}</td>
                <td>R$ {{number_format($c['price'],2,',','.')}}</td>
                <td>{{$c['amount']}}</td>
                <td>R$ {{number_format($c['price'] * $c['amount'],2,',','.')}}</td>
                <td><a href="{{route('cart.remove',["slug"=> $c['slug']])}}" class="btn btn-danger">Remove</a></td>

                @php
                    $total += $c['amount'] * $c['price'];
                @endphp
            </tr>
                
            @endforeach
            <tr colspan="25">
                <td colspan="3">Total:</td>
                <td colspan="2">R$ {{number_format($total,2,',','.')}}</td>
            </tr>
        </tbody>
    </table>

    <hr>
    <div class="vol-md-12">
        <a href="{{route('checkout.index')}}" class="btn btn-lg btn-success pull-right">Concluir Compra</a>
        <a href="{{route('cart.cancel')}}" class="btn btn-lg btn-danger pull-right">cancelar Compra</a>
    </div>


    @else

    <div class="alert alert-warning">Carrinho vazio</div>
        
    @endif
</div>
 
@endsection