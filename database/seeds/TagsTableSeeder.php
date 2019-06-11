<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 3,
                'created_at' => '2017-07-07 21:28:46',
                'updated_at' => '2017-07-07 21:28:46',
            ),
        ));
        
        
    }
}