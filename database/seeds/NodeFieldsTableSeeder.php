<?php

use Illuminate\Database\Seeder;

class NodeFieldsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('node_fields')->delete();
        
        \DB::table('node_fields')->insert(array (
            0 => 
            array (
                'id' => 35,
                'node_type_id' => 34,
                'name' => 'description',
                'label' => 'Description',
                'description' => NULL,
                'position' => 0.8,
                'type' => 'textarea',
                'visible' => 1,
                'indexed' => 0,
                'search_priority' => 0,
                'rules' => NULL,
                'default_value' => NULL,
                'options' => NULL,
                'created_at' => '2019-01-29 15:28:34',
                'updated_at' => '2019-01-29 15:28:34',
            ),
        ));
        
        
    }
}