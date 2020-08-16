<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Starter',
            'url' => 'starter',
            'price' => 199.99,
            'description' => 'Plano para pequenas e medias empresas.'
        ]);
    }
}
