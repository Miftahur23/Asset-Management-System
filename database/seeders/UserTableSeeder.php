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
                'name'=>'siam',
                'email'=>'siam@gmail.com',
                'password'=>bcrypt('12345'),
            ]);
    }
}
