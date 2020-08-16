<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Igor Lamas',
            'email' => 'teste@teste.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
