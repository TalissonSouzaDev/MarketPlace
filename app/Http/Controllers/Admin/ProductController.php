<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{store,product,categorie};


use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product,$store;

    public function __construct(product $product,store $store){
        $this->product = $product;
        $this->store = $store;

    }

    private function StoreUUid(){
        return empty(auth()->user()->store->uuid_store) ? '' : auth()->user()->store->uuid_store;
    }

    public function index(){
       
        $product =  $this->product->where('uuid_store',$this->StoreUUid())->paginate(10);
        return view('admin.pages.product.index',compact('product'));
    }

    public function create(){
        $categorie = categorie::all(['id','name']);
        return view('admin.pages.product.create',compact('categorie'));
    }

    public function store(request $request){
        $store =  $this->store->where('uuid_store',$this->StoreUUid())->first();
        $data = $request->all();
        $product = $store->product()->create($data);
        $product->categorie()->sync($request->categories);
        return redirect()->route("product.index")->with('sucess','Produto Criado com sucesso');
        

    }

    public function show($id){
        $productShow = $this->product->where('id',$id)->first();
        $product = $productShow ? $productShow : [];

        return view('admin.pages.product.show',compact('product'));
    }

    public function edit($id){

        $productedit = $this->product->where('id',$id)->first();
        $product = $productedit ? $productedit : [];
        $categorie = categorie::all();
        return view('admin.pages.product.edit',compact('product','categorie'));
    }


    public function update(request $request,$id){
        $productedit = $this->product->where('id',$id)->first();
        $product = $productedit ? $productedit : [];

        $product->update($request->all());
        $product->categorie()->sync($request->categories);
        

        return redirect()->route("product.index")->with('sucess','Produto Atualizada com sucesso');
    }


    public function destroy($id){
        $productdelete = $this->product->where('id',$id)->first();
        $product = $productdelete ? $productdelete : [];
        $product->delete();

       return redirect()->route("product.index")->with('sucess','produto deletado com sucesso');
    }

}
