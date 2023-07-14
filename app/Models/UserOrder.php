<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    //protected $table = 'user_order_store';

   protected $fillable = [
   'user_id',
   'references',
   'pagseguro_code',
    'pagseguro_status',
    'items'
   ];

   public function User(){
    return $this->belongsTo(User::class);
   }


   public function stores(){
    return $this->belongsToMany(store::class);
}
}
