@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <h2>Dados do pagamento</h2>
                <hr>
            </div>
        </div>

    </div>



    <form action="" method="post">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 form-group">
                <label >Número do cartão</label>
                <input type="text" class="form-control" name="card_number">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 form-group">
                <label >Mês de Expiração</label>
                <input type="text" class="form-control" name="card_month">
            </div>

            <div class="col-md-4 form-group">
                <label >Ano de Expiração</label>
                <input type="text" class="form-control" name="card_year">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 form-group">
                <label >Código de segurança</label>
                <input type="text" class="form-control" name="card_cvv">
            </div>
        
        </div>
    </div>
    <br>

    <button type="submit" class="btn btn-success btn-lg">Finalizar pagamento</button>
    </form>
</div>
    
@endsection