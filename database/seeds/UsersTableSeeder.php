<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('eroman123');
        User::create([
            'firstname' => 'Ernesto',
            'secondname' => 'Roman',
            'lastname' => 'eroman',
            'username'=>'eroman',
            'email' => 'eroman@mailinator.com',
            'password' => $password,
            'state' =>'A',
            'created_by'=>1,
            'updated_by' =>1,
            'created_at' =>NOW()
        ]);
    }
}
