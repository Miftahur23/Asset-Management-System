<?php

namespace Database\Seeders;

use App\Http\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert
            ([
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('12345'),
                'role'=>'admin',
                'employee_image'=>'image'
            ]);

        DB::table('managers')->insert
            ([
                'name'=>'manager',
                'email'=>'manager@gmail.com',
                'password'=>bcrypt('12345'),
                'role'=>'manager',
            ]);    
    }
}
