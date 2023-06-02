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


    public function ViewNotCategorie($id,$filter = null){
        $resultado = categorie::whereNotIn('id',function($query) use ($id){
            $query->where('categories_products.categorie_id');
            $query->from('categories_products');
            $query->whereRaw("categories_products.product={$id}");

        })->where('name','LIKE',"%{$filter}%")->paginate(20);
    }
}
