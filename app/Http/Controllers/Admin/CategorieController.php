<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\categorie;

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

    public function categorie(request $request){
      $this->categorie->create($request->all());
    
      return redirect()->route("categorie.index")->with('sucess','categoria Criado com sucesso');

    }

    public function show($id){
        $categorieShow = $this->categorie->where('id',$id)->first();
        $categorie = $categorieShow ? $categorieShow : [];

        return view('admin.pages.categorie.show',compact('categorie'));
    }

    public function edit($id){
        $categorieedit = $this->categorie->where('id',$d)->first();
        $categorie = $categorieedit ? $categorieedit : [];

        return view('admin.pages.categorie.edit',compact('categorie'));
    }


    public function update(request $request,$id){
        $categorieedit = $this->categorie->where('id',$id)->first();
        $categorie = $categorieedit ? $categorieedit : [];

        $categorie->update($request->all());

        return redirect()->route("categorie.index")->with('sucess','categoria Atualizada com sucesso');
    }


    public function destroy($id){
        $categoriedelete = $this->categorie->where('id',$id)->first();
        $categorie = $categoriedelete ? $categoriedelete : [];
        $categorie->delete();

       return redirect()->route("categorie.index")->with('sucess','categoria deletado com sucesso');
    }
}
