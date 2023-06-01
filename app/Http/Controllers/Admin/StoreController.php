<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\{store,User};

class StoreController extends Controller
{
    private $store,$user;

    public function __construct(store $store, User $user){
        $this->store = $store;
        $this->user = $user;

    }

    private function UserUUid(){
        return '29b66167-6f70-417c-9524-02667f3addbe';  //auth()->user()->user_uuid;
    }

    public function index(){
        $store =  $this->store->with('user')->where('user_uuid',$this->UserUUid())->first();
        return view('admin.pages.store.index',compact('store'));
    }

    public function create(){
        return view('admin.pages.store.create');
    }

    public function store(request $request){

       

        $user =  $this->user->with('store')->where('user_uuid',$this->UserUUid())->first();
        $user->store($request->all());

        return redirect()->route("store.index")->with('sucess',' Produto Criado com sucesso');

    }


    public function edit($uuid){

       
        $storeedit = $this->store->where('uuid_store',$uuid)->first();

     
        $store = $storeedit ? $storeedit : [];


        return view('admin.pages.store.edit',compact('store'));
    }


    public function update(request $request,$uuid){
        $storeedit = $this->store->where('uuid_store',$uuid)->first();
        $store = $storeedit ? $storeedit : [];

        $store->update($request->all());

        return redirect()->route("store.index")->with('sucess','Empresa Atualizada com sucesso');
    }


    public function destroy($uuid){
        $storedelete = $this->store->where('uuid_store',$uuid)->first();
        $store = $storedelete ? $storedelete : [];
        $store->delete();

       return redirect()->route("store.index")->with('sucess','Empresa Deletada com sucesso');
    }




    
}
