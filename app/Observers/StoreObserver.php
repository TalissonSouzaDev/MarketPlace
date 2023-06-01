<?php

namespace App\Observers;

use App\Models\store;
use Illuminate\Support\Str;

class StoreObserver
{
    /**
     * Handle the store "created" event.
     *
     * @param  \App\Models\store  $store
     * @return void
     */
    public function creating(store $store)
    {
        $store->uuid_store = Str::uuid();
        $store->slug = Str::kebab($store->name);
    }

    /**
     * Handle the store "updated" event.
     *
     * @param  \App\Models\store  $store
     * @return void
     */
    public function updating(store $store)
    {
        $store->slug = Str::kebab($store->name);
    }

  
}
