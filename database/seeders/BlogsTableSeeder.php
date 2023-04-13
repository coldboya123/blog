<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blogs')->delete();
        
        \DB::table('blogs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Title of post 1',
                'content' => 'Content of post 1',
                'created_at' => '2023-04-12 08:13:08',
                'updated_at' => '2023-04-13 15:33:40',
                'created_user' => 2,
                'updated_user' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Title of post 2',
                'content' => 'Content of post 2',
                'created_at' => '2023-04-13 15:33:57',
                'updated_at' => '2023-04-13 15:33:57',
                'created_user' => 2,
                'updated_user' => 0,
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'Title of post 3',
                'content' => 'Content of post 3',
                'created_at' => '2023-04-13 15:34:38',
                'updated_at' => '2023-04-13 15:34:38',
                'created_user' => 2,
                'updated_user' => 0,
            ),
        ));
        
        
    }
}