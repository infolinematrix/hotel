<?php

use Illuminate\Database\Seeder;

class NodeSourcesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('node_sources')->delete();
        
        \DB::table('node_sources')->insert(array (
            0 => 
            array (
                'id' => 332,
                'node_id' => 1,
                'title' => 'Home Page',
                'node_name' => 'home-page',
                'locale' => 'en',
                'source_type' => 'basicpage',
                'meta_title' => 'Indian Ethnic Fashion Store for Women',
                'meta_keywords' => 'Sarees, Kurtis, Jewelries, Bags, Fashion Accessories',
                'meta_description' => 'Dorii.in is a nice boutique for all your Indian ethnic clothing, Our exquisite range for you is designed and inspired by our strong sense of Indian culture.',
                'meta_author' => NULL,
                'meta_image' => 0,
            ),
        ));
        
        
    }
}