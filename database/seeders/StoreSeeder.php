<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $user->store()->create([
            'name' => 'MuitoMais',
            'description' => 'Loja muito boa',
            'phone' =>'71987547785',
            'mobile_phone'=>'71987547785'
        ]);
    }
}
