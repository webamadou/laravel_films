<?php

use Illuminate\Database\Seeder;

class createUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [   'name'      => 'amadou',
                'email'     =>'paab26@live.fr',
                'email_verified_at' =>null,
                'password'  =>'$2y$10$XjrVkxuiTgvY7munj5t2Z.UUduSkqRuk.zzlgBkVF6Us3aiGQnwKq',
                'remember_token'    =>null,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]
        ];
        DB::table('users')->insert($user);
    }
}
