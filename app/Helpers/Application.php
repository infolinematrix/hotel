<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 4/4/17
 * Time: 12:42 PM
 */



use ReactorCMS\Entities\NodeMeta;
use Reactor\Documents\Media\Media;

use ReactorCMS\Entities\Node;
use ReactorCMS\Entities\Settings;
//use App\Support\Database\CacheQueryBuilder;




/*Get Mail Confriguration*/

if (!function_exists('getMailconfig')) {

    function getMailconfig()
    {
        $config = [
            'driver' => getSettings('email_driver'),
            'host' => getSettings('email_host'),
            'port' => getSettings('email_port'),
            'from' => [
                'address' => getSettings('email_from_email'),
                'name' => config('application.company.title')],
            'encryption' => getSettings('email_encryption'),
            'username' => getSettings('email_user'),
            'password' => getSettings('email_password'),
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        ];

        return $config;

    }
}

/*Get Settings*/

if (!function_exists('getSettings')) {

    function getSettings($variable = '')
    {

        //$settings = Settings::where('variable', $variable)->first();
        $settings = Cache::rememberForever('settings_' . $variable, function () use ($variable) {
            return Settings::where('variable', $variable)->first();
        });

        if ($settings) {
            return $settings->value;
        } else {

            return false;
        }

    }
}


