<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            '0'=>[
                'first_name' => 'Vasya',
                'last_name' => 'Pupkin',
                'email' => 'admin@admin.com',
                'role_id' => Role::where('alias', 'admin')->first()->id,
                'password' => Hash::make('123456'),
            ],
            '1'=>[
                'first_name' => 'Petr',
                'last_name' => 'Pupkin',
                'email' => 'client@client.com',
                'role_id' => Role::where('alias', 'client')->first()->id,
                'password' => Hash::make('123456'),
            ],
            '3'=>[
                'first_name' => 'Roma',
                'last_name' => 'Pupkin',
                'email' => 'booker@booker.com',
                'role_id' => Role::where('alias', 'booker')->first()->id,
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
