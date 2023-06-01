<?php

namespace App\Observers;

use App\Models\product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function creating(product $product)
    {
        
        $product->slug = Str::kebab($product->name);
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function updating(product $product)
    {
        $product->slug = Str::kebab($product->name);
    }

}
