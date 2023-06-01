<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{store,product};


use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product,$store;

    public function __construct(product $product,store $store){
        $this->product = $product;
        $this->store = $store;

    }

    private function StoreUUid(){
        return 'f08585b9-de2d-42ec-ab13-114f943767a6';  //auth()->user()->store()->uuid_store;
    }

    public function index(){
        $product =  $this->product->where('uuid_store',$this->StoreUUid())->paginate(10);
        return view('admin.pages.product.index',compact('product'));
    }

    public function create(){
        return view('admin.pages.product.create');
    }

    public function store(request $request){
        $store =  $this->store->where('uuid_store',$this->StoreUUid())->first();
        $product = $store->product()->create($request->all());
        return redirect()->route("product.index")->with('sucess','Produto Criado com sucesso');

    }

    public function show($id){
        $productShow = $this->product->with('store.user')->where('id',$id)->first();
        $product = $productShow ? $productShow : [];

        return view('admin.pages.product.show',compact('product'));
    }

    public function edit($id){
        $productedit = $this->product->where('id',$d)->first();
        $product = $productedit ? $productedit : [];

        return view('admin.pages.product.edit',compact('product'));
    }


    public function update(request $request,$uuid){
        $productedit = $this->product->where('id',$id)->first();
        $product = $productedit ? $productedit : [];

        $product->update($request->all());

        return redirect()->route("product.index")->with('sucess','Produto Atualizada com sucesso');
    }


    public function destroy($id){
        $productdelete = $this->product->where('id',$id)->first();
        $product = $productdelete ? $productdelete : [];
        $product->delete();

       return redirect()->route("product.index")->with('sucess','produto deletado com sucesso');
    }

}
