<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function UserOrder(){
        return $this->HasMany(UserOrder::class);
    }
}
