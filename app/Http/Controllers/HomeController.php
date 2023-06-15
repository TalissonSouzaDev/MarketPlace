<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

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
        $product = $this->product->paginate();
        return view('welcome',compact('product'));
    }

    public function produtoSlug($slug)
    {
        $product = $this->product->where('slug',$slug)->first();

        return view('single',compact('product'));
    }
}
