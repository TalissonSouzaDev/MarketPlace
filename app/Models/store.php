<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\OrderReceiveStore;

class store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'phone',
        'mobile_phone',
        'logo',
        'user_uuid'

    ];

    public function user(){
        return $this->belongsTo(User::class,'user_uuid','user_uuid');
    }

    public function product(){
        return $this->HasMany(product::class,'uuid_store','uuid_store');
    }

    public function orders(){
        return $this->belongsToMany(UserOrder::class,'order_store','store_id','order_id');
    }


    public function notifyStoreOwners(array $storeId = []){

        $stores = $this->whereIn('uuid_store',$storeId)->get();

        $stores->map(function($store){
            return $store->user;
        })->each->notify(new OrderReceiveStore());


        
    }
}
