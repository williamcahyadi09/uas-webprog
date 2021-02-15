<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => "Admin",
                'email' => "admin@admin.com",
                'phone' => "081234234",
                'role' => "admin",
                'password' => bcrypt("password"),
            ],
            [
                'name' => "User",
                'email' => "user@user.com",
                'phone' => "0825347242",
                'role' => "user",
                'password' => bcrypt("password"),
            ],
        ]);
    }
}
