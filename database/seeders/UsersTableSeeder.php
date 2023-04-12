<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0YcldoJ7SRm2bNlKaJAMTuklBQlG9FQbnmcceUe9yYqTZCSzXbMt.',
                'role' => '1',
                'remember_token' => NULL,
                'created_at' => '2023-04-11 05:28:45',
                'updated_at' => '2023-04-11 05:28:45',
                'created_user' => 0,
                'updated_user' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0YcldoJ7SRm2bNlKaJAMTuklBQlG9FQbnmcceUe9yYqTZCSzXbMt.',
                'role' => '2',
                'remember_token' => NULL,
                'created_at' => '2023-04-11 05:48:30',
                'updated_at' => '2023-04-11 05:48:30',
                'created_user' => 0,
                'updated_user' => 0,
            ),
        ));
        
        
    }
}