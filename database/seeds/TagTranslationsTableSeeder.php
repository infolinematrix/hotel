<?php

use Illuminate\Database\Seeder;

class TagTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tag_translations')->delete();
        
        \DB::table('tag_translations')->insert(array (
            0 => 
            array (
                'id' => 4,
                'tag_id' => 3,
                'locale' => 'en',
                'title' => 'My TEST Blog',
                'tag_name' => 'my-blog',
            ),
        ));
        
        
    }
}