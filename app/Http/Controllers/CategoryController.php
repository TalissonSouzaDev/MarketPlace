<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;

class CategoryController extends Controller
{
    private $category;
  public function __construct(categorie $category){
    $this->category = $category;
  }


    public function index($name){
        $category =  $this->category->with('product')->where('name',$name)->first();

        return view("category",compact('category'));

    }
}
