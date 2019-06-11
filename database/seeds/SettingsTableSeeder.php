<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'variable' => 'address',
                'value' => 'Siliguri, West Bengal, India - 734001',
                'created_at' => '2018-10-12 16:34:12',
                'updated_at' => '2019-01-18 15:50:35',
            ),
            1 => 
            array (
                'variable' => 'default_language',
                'value' => 'en',
                'created_at' => '2018-10-12 16:34:14',
                'updated_at' => '2019-01-18 15:50:37',
            ),
            2 => 
            array (
                'variable' => 'email_driver',
                'value' => 'SMTP',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            3 => 
            array (
                'variable' => 'email_encryption',
                'value' => 'SSL',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            4 => 
            array (
                'variable' => 'email_form_name',
                'value' => 'Script Bazar',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            5 => 
            array (
                'variable' => 'email_from_email',
                'value' => 'mail2.scriptbazar@gmail.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            6 => 
            array (
                'variable' => 'email_host',
                'value' => 'smtp.gmail.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            7 => 
            array (
                'variable' => 'email_password',
                'value' => 'matrix0404',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            8 => 
            array (
                'variable' => 'email_port',
                'value' => '465',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            9 => 
            array (
                'variable' => 'email_user',
                'value' => 'mail2.scriptbazar@gmail.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            10 => 
            array (
                'variable' => 'google_ad_pubid',
                'value' => 'PUBlisher ID',
                'created_at' => '2018-10-12 16:34:14',
                'updated_at' => '2019-01-18 15:50:37',
            ),
            11 => 
            array (
                'variable' => 'google_analytics_api',
                'value' => 'Eenter Google Analytic ID',
                'created_at' => '2018-10-12 16:34:14',
                'updated_at' => '2019-01-18 15:50:37',
            ),
            12 => 
            array (
                'variable' => 'google_map_api',
                'value' => 'AIzaSyBfhwAJEz_8SlLdmKRhymB-ZjpHJukmwDk',
                'created_at' => '2018-10-12 16:34:14',
                'updated_at' => '2019-01-18 15:50:37',
            ),
            13 => 
            array (
                'variable' => 'office_timing',
                'value' => 'Monday - saturday, 10am - 8pm',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            14 => 
            array (
                'variable' => 'phone',
            'value' => '0 (+91) 98328-93116',
                'created_at' => '2018-10-12 16:34:12',
                'updated_at' => '2019-01-18 15:50:35',
            ),
            15 => 
            array (
                'variable' => 'site_logo',
                'value' => '',
                'created_at' => NULL,
                'updated_at' => '2019-01-18 15:50:37',
            ),
            16 => 
            array (
                'variable' => 'site_mode',
                'value' => '0',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            17 => 
            array (
                'variable' => 'site_title',
                'value' => 'Reactor',
                'created_at' => '2018-10-12 16:34:12',
                'updated_at' => '2019-01-18 15:50:35',
            ),
            18 => 
            array (
                'variable' => 'site_url',
                'value' => 'http://www.scriptbazar.com',
                'created_at' => '2018-10-12 16:34:12',
                'updated_at' => '2019-01-18 15:50:35',
            ),
            19 => 
            array (
                'variable' => 'skype',
                'value' => 'infolinematrix',
                'created_at' => '2018-10-12 16:34:12',
                'updated_at' => '2019-01-18 15:50:35',
            ),
            20 => 
            array (
                'variable' => 'social_facebook',
                'value' => 'http://www.facebook.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            21 => 
            array (
                'variable' => 'social_google',
                'value' => 'http://www.plus.google.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            22 => 
            array (
                'variable' => 'social_instagram',
                'value' => 'http://www.instagram.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            23 => 
            array (
                'variable' => 'social_linkedin',
                'value' => 'http://www.linkedin.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            24 => 
            array (
                'variable' => 'social_pinterest',
                'value' => 'http://www.pininterest.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            25 => 
            array (
                'variable' => 'social_twitter',
                'value' => 'http://www.twitter.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
            26 => 
            array (
                'variable' => 'social_youtube',
                'value' => 'http://www.youtube.com',
                'created_at' => '2018-10-12 16:34:13',
                'updated_at' => '2019-01-18 15:50:36',
            ),
        ));
        
        
    }
}