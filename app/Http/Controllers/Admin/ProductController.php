<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{store,product,categorie,ProductImage};


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
       
        $product =  $this->product->where('uuid_store',$this->StoreUUid())->latest()->paginate(10);
        return view('admin.pages.product.index',compact('product'));
    }

    public function create(){
        $categorie = categorie::all(['id','name']);
        return view('admin.pages.product.create',compact('categorie'));
    }

    public function store(request $request){
        $store =  $this->store->where('uuid_store',$this->StoreUUid())->first();
        $data = $request->all();
        $categorie = $request->get('categories',null);
        if(is_null($categorie)){
            return redirect()->back()->with('error','Precisa pelo menos Adicona uma categoria');
        }
        $product = $store->product()->create($data);
        $product->categorie()->sync($request->categories);
        if($request->hasFile('image')){
            $imagem = $this->ImagemUpload($request['image'],'image');
            // inseri em productimage
            $product->productimage()->createMany($imagem);
            
        }
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
        $categorie = $request->get('categories',null);
        if(is_null($categorie)){
            return redirect()->back()->with('error','Precisa pelo menos Adicona uma categoria');
        }

        $product->update($request->all());
        $product->categorie()->sync($request->categories);

        if($request->hasFile('image')){
            $imagem = $this->ImagemUpload($request['image'],'image');
            // inseri em productimage
            $product->productimage()->createMany($imagem);
            
        }
        

        return redirect()->route("product.index")->with('success','Produto Atualizada com sucesso');
    }


    public function destroy($id){
        $productdelete = $this->product->where('id',$id)->first();
        $product = $productdelete ? $productdelete : [];
        $product->delete();

       return redirect()->route("product.index")->with('success','produto deletado com sucesso');
    }

    public function destroyimage($id){
        $productdelete = ProductImage::where('id',$id)->first();
        $productimage = $productdelete ? $productdelete : [];
        $productimage->delete();

       return redirect()->route("product.edit",[$productimage->product_id])->with('success','produto deletado com sucesso');
    }


    private function ImagemUpload(array $img,$ImagemColumn){
        $uploadimages = [];
        foreach($img as $imagem){
            $uploadimages[] = [$ImagemColumn => $imagem->store("products",'public')];
        }
        return $uploadimages;
    }

}
