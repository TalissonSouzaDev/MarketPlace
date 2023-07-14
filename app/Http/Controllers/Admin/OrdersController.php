<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserOrder;

class OrdersController extends Controller
{
    private $order;

    public function __construct(UserOrder $order){
        $this->order =  $order;
    }

    public function index(){

        $orders =  $this->order->paginate();
        return view("admin.pages.orders.index",compact("orders"));
    }
}
