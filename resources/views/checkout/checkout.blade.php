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
                <label >Número do cartão <span></span class='brand'></label>
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

@section('script')

<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

<script>
    const sessionId = `${session()->get('pagseguro_session_code')}`
    PagSeguroDirectPayment.setSessionId(sessionId)
</script>

<script>

    let cardNumber = document.querySelector('input[name=card_number]');
    let spanBrand= document.querySelector('span.brand');

    cardNumber.addEventeListener("keyup",function(){
        if(cardNumber.value.length >= 6){
            PagSeguroDirectPayment.getBrand({
                cardBin: cardNumber.value.substr(0,6),
                success: function(res){
                    let imgFlag = `<img src='/${res.brand.name}.png' />`
                    spanBrand.innerHtml = imgFlag
                    console.log(res)
                },

                error: function(res){
                    console.log(res)
                },
            })
        }
    })
</script>


@endsection