<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{product,categorie};

class CategorieProductController extends Controller
{
  public function __construct(product $product , categorie $categorie){

    $this->product = $product;
    $this->categorie = $categorie;
  }

    public function categorie($idproduct){

        $product = $this->product->with("categorie")->where('id',$idproduct)->first();
        $categorie = $produc->categorie()->paginate(10);
        return view('admin.pages.product.categorie.categorie',compact('product','categorie'));

    }

    public function ViewNotAttach(request $request,$idproduct){

        $product = $this->product->where('id',$idproduct)->first();

        $categorie = $product->ViewNotCategorie($product->id,$request->filter);

        return view('admin.pages.product.categorie.available',compact('product','categorie'));

    }

    public function Attach(request $request,$idproduct){
        $product = $this->product->with("categorie")->where('id',$idproduct)->first();
        $produc->categorie()->attach($request->categorie);
        return redirect()->route('categorie.product',$produc->id);

    }

    public function Dettach(request $request,$idproduct){
        $product = $this->product->with("categorie")->where('id',$idproduct)->first();
        $produc->categorie()->Dettach($request->categorie);
        return redirect()->route('categorie.product',$produc->id);
    }
}
