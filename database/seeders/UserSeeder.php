<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'parvaz@gmail.com')->first();
        if(is_null($user)){
        $user = new User();
        $user->name = "Parvaz";
        $user->email = "parvaz@gmail.com";
        $user->password = Hash::make('12345');       
        $user->save();    
        }  
    }
}
