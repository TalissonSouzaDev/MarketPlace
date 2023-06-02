<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Http\Requests\CategorieRequest;

class CategorieController extends Controller
{
    private $categorie;

    public function __construct(categorie $categorie){
        
        $this->categorie = $categorie;

    }

    public function index(){
        $categorie =  $this->categorie->paginate(10);
        return view('admin.pages.categorie.index',compact('categorie'));
    }

    public function create(){
        return view('admin.pages.categorie.create');
    }

    public function store(CategorieRequest $request){
      $this->categorie->create($request->all());
    
      return redirect()->route("categorie.index")->with('success','categoria Criado com sucesso');

    }

    public function edit($id){
        $categorieedit = $this->categorie->where('id',$id)->first();
        $categorie = $categorieedit ? $categorieedit : [];

        return view('admin.pages.categorie.edit',compact('categorie'));
    }


    public function update(CategorieRequest $request,$id){
        $categorieedit = $this->categorie->where('id',$id)->first();
        $categorie = $categorieedit ? $categorieedit : [];

        $categorie->update($request->all());

        return redirect()->route("categorie.index")->with('success','categoria Atualizada com sucesso');
    }


    public function destroy($id){
        $categoriedelete = $this->categorie->where('id',$id)->first();
        $categorie = $categoriedelete ? $categoriedelete : [];
        $categorie->delete();

       return redirect()->route("categorie.index")->with('success','categoria deletado com sucesso');
    }
}
