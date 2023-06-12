<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'body',
        'price',
        'uuid_store'
    ];

    
    public function store(){
        return $this->belongsTo(store::class,'uuid_store','uuid_store');
    }

    public function categorie(){
        return $this->belongsToMany(categorie::class);
    }

}
