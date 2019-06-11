<?php

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
                'email' => 'admin@admin.com',
                'password' => '$2y$10$JENMbHDVyqiAFQyoH83x6eDE/AtlF8.byB/5FagiQT2C6n73tV7lO',
                'first_name' => 'Administrator',
                'last_name' => 'Reactor',
                'remember_token' => 'i3X3yxTGrrqrYO4cKfJ28XWe9uYXrwPlBZDFmm5DR4QJDzlUXteBxBRmEVLN',
                'created_at' => '2017-04-01 02:54:59',
                'updated_at' => '2019-01-29 14:39:16',
                'deleted_at' => NULL,
                'home' => NULL,
                'country' => 'India',
                'phone' => '9832893116',
                'gender' => 'Male',
                'dob' => '1976-11-06',
                'pincode' => 734001,
                'city' => 'Hakimpara, Siliguri',
                'address' => '5/1, Rajani Kanta Srani',
                'status' => 51,
            ),
        ));
        
        
    }
}