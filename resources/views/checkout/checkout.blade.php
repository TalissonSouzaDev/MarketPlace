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



    <form  method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 form-group">
                <label >Nome do cartão <span></label>
                <input type="text" class="form-control" name="card_name">
          
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label >Número do cartão <span></span class='brand'></label>
                <input type="text" class="form-control" name="card_number">
                <input type="hidden" class="form-control" name="card_brand">
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

            <div class="col-md-12 insatllments form-group">

            </div>
        
        </div>
    </div>
    <br>

    <button type="submit" class="btn btn-success btn-lg processcheckout">Finalizar pagamento</button>
    </form>
</div>
    
@endsection

@section('script')

<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="{{asset('assets/js/jquery.ajax.js')}}"></script>

<script>
    const sessionId = `${session()->get('pagseguro_session_code')}`
    PagSeguroDirectPayment.setSessionId(sessionId)
</script>

<script>
    let amountransaction = ''
    let cardNumber = document.querySelector('input[name=card_number]');
    let spanBrand= document.querySelector('span.brand');

    // banderia do cartão
    cardNumber.addEventeListener("keyup",function(){
        if(cardNumber.value.length >= 6){
            PagSeguroDirectPayment.getBrand({
                cardBin: cardNumber.value.substr(0,6),
                success: function(res){
                    let imgFlag = `<img src='http://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png' />`
                    spanBrand.innerHtml = imgFlag
                    getinstallments(40,res.brand.name);
                    document.querySelector("input[name=card_brand]").value = res.brand.name;
                    console.log(res)
                },

                error: function(res){
                    console.log(res)
                },

            })
        }
    });

    // parcelamento
    function getinstallments(amount,brand)
    {
        PagSeguroDirectPayment.getInstallments({
            amount: amount,
            brand: brand,
            maxInstallmentNoInterest:0,


            success: function(res){
                let selectInstallments =  drawSelectInstallments(res.installments[brand]);
                document.querySelector('div.installments').innerHtml =  selectInstallments;
            },
            error: function(res){},
            complete: function(res){},
        })
                    
    }

    // gera token

    let SubmitButton = document.querySelector("button.processcheckout");
    SubmitButton.addEventeListener('click',fucntion(event){
        event.preventDefault();
        
        PagSeguroDirectPayment.createCardToken({
            cardNumber: document.querySelector("input[name=card_number]").value,
            brand: document.querySelector("input[name=card_brand]").value ,
            cvv: document.querySelector("input[name=card_cvv]").value,
            expirateMonth: document.querySelector("input[name=card_month]").value,
            expirateYaer: document.querySelector("input[name=card_yaer]").value,
            success: function(res){
                processpayment(res.card.token);
               
            },
            error: function(res){},
            complete: function(res){},

        })
    })


    // envia para o backend

    function processpayment(token){

        let data = {
            card_token:token,
            hash: PagSeguroDirectPayment.getSenderHash(),
            installments: document.querySelector('.installment_parc').value,
            card_name: document.querySelector('input[name=card_name]').value,
            _token: document.querySelector('input[name=_token]').value
        }
        $.ajax({
            method:'POST',
            url:'{{route("checkout.process")}}',
            data: data,
            dataType: 'json',

            success:fucntion(res){
                console.log(res);
            }
        });
    }

    // mostrando parcelamento

    function drawSelectInstallments(installments) {
		let select = '<label>Opções de Parcelamento:</label>';

		select += '<select class="form-control installment_parc" name="">';

		for(let l of installments) {
		    select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount}</option>`;
		}


		select += '</select>';

		return select;
        // https://gist.github.com/NandoKstroNet/aaeb885fd237395638b8043be3d780a3
	}
</script>


@endsection