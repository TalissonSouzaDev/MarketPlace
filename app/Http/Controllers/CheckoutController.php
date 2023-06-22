<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(){
        
    }
    
    public function index()
    {
      if(!auth()->check()){
        return redirect()->route("login");
      }

     
      
      if(!session()->has('cart')){
        return redirect()->route('cart.index');
      }
   

      return view('checkout.checkout');
    

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
