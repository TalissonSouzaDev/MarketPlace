<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositorie\Pagseguro\Pagseguro;

class CheckoutController extends Controller
{
  private $Pagseguro;
    public function __construct(Pagseguro $Pagseguro){
        $this->middleware('CheckoutVerify');
        $this->Pagseguro = $Pagseguro;
    }
    
    public function index()
    {
      //$this->MakePagseguroSessionCode();  

      return view('checkout.checkout');
    

    }


    public function process(request $request){

      $this->Pagseguro->CardCredit($request);

    
    UserOrder::create([
      'user_id'=>$user->id,
      'store_id'=> '2',
      'references' => $references,
      'pagseguro_code' => $result->getCode(),
      'pagseguro_status'  => $result->setStatus(),
       'items' => sinalize($cartitem)
    ]);

    session()->forget('cart');
    session()->forget('pagseguro_session_code');

    return response()->json([
      'data'=>[
        'status' => true,
        'message'=> 'pedido criado com sucesso'
      ]
      ]);

  }


    private function MakePagseguroSessionCode(){
        if(!session()->has('pagseguro_session_code')){

            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );

            return session()->put('pagseguro_session_code',$sessionCode->getResult());
        }
    }
}
