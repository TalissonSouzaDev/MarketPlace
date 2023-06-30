<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{product,store};

class HomeController extends Controller
{
    private $product;

    public function __construct(product $product){
        $this->product = $product;

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = $this->product->limit(6)->get();
        $store = store::limit(3)->get();
        return view('welcome',compact('product','store'));
    }

    public function produtoSlug($slug)
    {
        $product = $this->product->where('slug',$slug)->first();

        return view('single',compact('product'));
    }
}
