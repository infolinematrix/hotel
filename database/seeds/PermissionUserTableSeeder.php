<?php

use Illuminate\Database\Seeder;

class PermissionUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_user')->delete();
        
        \DB::table('permission_user')->insert(array (
            0 => 
            array (
                'permission_id' => 19,
                'user_id' => 5,
            ),
            1 => 
            array (
                'permission_id' => 21,
                'user_id' => 5,
            ),
            2 => 
            array (
                'permission_id' => 23,
                'user_id' => 5,
            ),
        ));
        
        
    }
}