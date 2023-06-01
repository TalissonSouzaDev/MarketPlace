<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\store;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = store::first();
        $store->product()->create([
            'name' => 'Camiseta',
            'description' => 'Tipo algoodão',
            'body' => 'teste',
            'price' => 10.2
        ]);
    }
}
