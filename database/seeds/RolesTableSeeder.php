<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            '0'=>[
                'name' => 'Admin',
                'alias' => 'admin',
            ],
            '1'=>[
                'name' => 'Client',
                'alias' => 'client',
            ],
            '3'=>[
                'name' => 'Booker',
                'alias' => 'booker',
            ],
        ];

        foreach ($roles as $role){
            Role::create($role);
        }
    }
}
