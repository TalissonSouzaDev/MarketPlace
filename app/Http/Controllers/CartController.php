<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(){
      $cart = session()->has('cart') ? session()->get('cart') : [];

      return view('carrinho.cart',compact('cart'));
    }
    

    public function add(request $request){
        $product = $request->get('product');
        //verificar se exister sessão para os produtos
            session()->push('cart',$product);
            return redirect()->back()->with('success','Adicionado no carrinho');
}
       
    


    public function remove($slug){

       
        if(!session()->has('cart')){

            return redirect()->route('cart.index');
        }

        $products = session()->get('cart');

        $products = array_filter($products,function($line) use ($slug){
            return $line['slug'] != $slug;
        });

        session()->put('cart',$products);
        return redirect()->back()->with('success','excluido do carrinho');
    }

    public function cancel(){
        session()->forget('cart');
        return redirect()->back()->with('success','carinho limpo com sucesso');
    }


    private function productMap($slug,$amount,$products){
        $products = array_map(function($line) use ($slug,$amount){
         if($slug == $line['slug']){
            $line['amount'] += $amount;
         }
         return $line;
        },$products);

        return $products;
    }
}
