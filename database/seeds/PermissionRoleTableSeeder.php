<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 2,
                'role_id' => 2,
            ),
            2 => 
            array (
                'permission_id' => 3,
                'role_id' => 2,
            ),
            3 => 
            array (
                'permission_id' => 4,
                'role_id' => 2,
            ),
            4 => 
            array (
                'permission_id' => 5,
                'role_id' => 2,
            ),
            5 => 
            array (
                'permission_id' => 6,
                'role_id' => 2,
            ),
            6 => 
            array (
                'permission_id' => 7,
                'role_id' => 2,
            ),
            7 => 
            array (
                'permission_id' => 8,
                'role_id' => 2,
            ),
            8 => 
            array (
                'permission_id' => 9,
                'role_id' => 2,
            ),
            9 => 
            array (
                'permission_id' => 10,
                'role_id' => 2,
            ),
            10 => 
            array (
                'permission_id' => 11,
                'role_id' => 2,
            ),
            11 => 
            array (
                'permission_id' => 12,
                'role_id' => 2,
            ),
            12 => 
            array (
                'permission_id' => 13,
                'role_id' => 2,
            ),
            13 => 
            array (
                'permission_id' => 14,
                'role_id' => 2,
            ),
            14 => 
            array (
                'permission_id' => 15,
                'role_id' => 2,
            ),
            15 => 
            array (
                'permission_id' => 16,
                'role_id' => 2,
            ),
            16 => 
            array (
                'permission_id' => 17,
                'role_id' => 2,
            ),
            17 => 
            array (
                'permission_id' => 18,
                'role_id' => 3,
            ),
            18 => 
            array (
                'permission_id' => 19,
                'role_id' => 3,
            ),
            19 => 
            array (
                'permission_id' => 20,
                'role_id' => 3,
            ),
            20 => 
            array (
                'permission_id' => 21,
                'role_id' => 3,
            ),
            21 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            22 => 
            array (
                'permission_id' => 23,
                'role_id' => 3,
            ),
            23 => 
            array (
                'permission_id' => 24,
                'role_id' => 3,
            ),
            24 => 
            array (
                'permission_id' => 25,
                'role_id' => 3,
            ),
            25 => 
            array (
                'permission_id' => 26,
                'role_id' => 3,
            ),
            26 => 
            array (
                'permission_id' => 27,
                'role_id' => 3,
            ),
            27 => 
            array (
                'permission_id' => 28,
                'role_id' => 3,
            ),
            28 => 
            array (
                'permission_id' => 29,
                'role_id' => 3,
            ),
            29 => 
            array (
                'permission_id' => 30,
                'role_id' => 3,
            ),
            30 => 
            array (
                'permission_id' => 31,
                'role_id' => 3,
            ),
        ));
        
        
    }
}