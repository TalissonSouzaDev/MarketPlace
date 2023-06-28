<?php


namespace App\Http\Repositorie\Pagseguro;
use Illuminate\Http\Request;


class Pagseguro {

    public function CardCredit(request $request){

        $cartItemvalue = array_map(function($line){
            return $line['amount'] * $line['price'];
          },session()->get('cart'));
    
          $cartItemvalue = array_sum($cartItemvalue);
    
          $references = 'XPTO';
          $datapost =  $request->all();
    
       $creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
    
       $creditCard->setReceiverEmail(env('PAGSEGURO_EMAIL'));
    
    // Set a reference code for this payment request. It is useful to identify this payment
    // in future notifications.
    $creditCard->setReference($references);
    
    // Set the currency
    $creditCard->setCurrency("BRL");
    
    // Add an item for this payment request
    $cartitem = session()->get("cart");
    
    foreach($cartitem as $item){
      $creditCard->addItems()->withParameters(
        $references,
        $item['name'],
        $item['amount'],
        $item['price']
      );
    }
    
    
    
    
    
    
    
    
    // Set your customer information.
    // If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
    
    $user =  auth()->user();
    $email =  env('PAGSEGURO_EMAIL') == 'sandbox' ? 'teste@sandbox.pagseguro.com.br' : $user->email;
    $creditCard->setSender()->setName($user->name);
    $creditCard->setSender()->setEmail($email);
    
    $creditCard->setSender()->setPhone()->withParameters(
        11,
        56273440
    );
    
    $creditCard->setSender()->setDocument()->withParameters(
        'CPF',
        '8758632587454'
    );
    
    $creditCard->setSender()->setHash($datapost['hash']);
    
    $creditCard->setSender()->setIp('127.0.0.0');
    
    // Set shipping information for this payment request
    $creditCard->setShipping()->setAddress()->withParameters(
        'Av. Brig. Faria Lima',
        '1384',
        'Jardim Paulistano',
        '01452002',
        'São Paulo',
        'SP',
        'BRA',
        'apto. 114'
    );
    
    //Set billing information for credit card
    $creditCard->setBilling()->setAddress()->withParameters(
        'Av. Brig. Faria Lima',
        '1384',
        'Jardim Paulistano',
        '01452002',
        'São Paulo',
        'SP',
        'BRA',
        'apto. 114'
    );
    
    // Set credit card token
    $creditCard->setToken($datapost['card_token']);
    list($quantity,$installmentAmount) =  explode("|",$datapost['installment']);
    $installmentAmount =  number_format($installmentAmount,2,'.','');
    $creditCard->setInstallment()->withParameters($quantity, $installmentAmount);
    
    // Set the credit card holder information
    $creditCard->setHolder()->setBirthdate('01/10/1979');
    $creditCard->setHolder()->setName($datapost['card_name']); // Equals in Credit Card
    
    $creditCard->setHolder()->setPhone()->withParameters(
        11,
        56273440
    );
    
    $creditCard->setHolder()->setDocument()->withParameters(
        'CPF',
        '8754878754548785'
    );
    
    // Set the Payment Mode for this payment request
    $creditCard->setMode('DEFAULT');
    
    // Set a reference code for this payment request. It is useful to identify this payment
    // in future notifications.
    
    
        //Get the crendentials and register the credit card payment
        $result = $creditCard->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );
    

    }

    
}