<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;

use Illuminate\Http\Request;
use App\Models\{store,User};

class StoreController extends Controller
{
    private $store,$user;

    public function __construct(store $store, User $user){
        $this->store = $store;
        $this->user = $user;
        $this->middleware('UserStore')->only(['create','store']);

    }

    private function UserUUid(){
        return auth()->user()->user_uuid;
    }

    public function index(){
        $store =  $this->store->with('user')->where('user_uuid',$this->UserUUid())->first();
        return view('admin.pages.store.index',compact('store'));
    }

    public function create(){
      
        return view('admin.pages.store.create');
    }

    public function store(StoreRequest $request){

        $user =  $this->user->where('user_uuid',$this->UserUUid())->first();
        $user->store()->create($request->all());

        return redirect()->route("store.index")->with('success',' Empresa Criado com sucesso');

    }


    public function edit($uuid){

       
        $storeedit = $this->store->where('uuid_store',$uuid)->first();

     
        $store = $storeedit ? $storeedit : [];


        return view('admin.pages.store.edit',compact('store'));
    }


    public function update(StoreRequest $request,$uuid){
        $storeedit = $this->store->where('uuid_store',$uuid)->first();
        $store = $storeedit ? $storeedit : [];

        $store->update($request->all());

        return redirect()->route("store.index")->with('success','Empresa Atualizada com sucesso');
    }


    public function destroy($uuid){
        $storedelete = $this->store->with('product')->where('uuid_store',$uuid)->first();
        $store = $storedelete ? $storedelete : [];
        if($store->product()->count() > 0){
             return redirect()->back()->with('warning','Humm.. , Parece que existir alguns produtos cadastrado');
        }


        $store->delete();

       return redirect()->route("store.index")->with('success','Empresa Deletada com sucesso');
    }




    
}
