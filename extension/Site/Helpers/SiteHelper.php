<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 4/4/17
 * Time: 12:42 PM
 */
/*Get Mail Confriguration*/
use ReactorCMS\Entities\Settings;
use ReactorCMS\Entities\Node;
use Reactor\Documents\Media\Media;
use Illuminate\Database\Eloquent\Builder;

if (!function_exists('nodeViewd')) {

    function nodeViewd($url = NULL)
    {
        $result = 15;

        $sql = "select count(*) as total from site_views where url = '$url' ";
        $query = \DB::select($sql);

        if($query){
            $result = $query[0]->total;
        }

        return $result;
    }
}

if (!function_exists('getMailconfig')) {

    function getMailconfig()
    {


        $config = [
            'driver' => trim(getSettings('email_driver')),
            'host' => trim(getSettings('email_host')),
            'port' => trim(getSettings('email_port')),
            'from' => [
                'address' => trim(getSettings('email_from_email')),
                'name' => trim(getSettings('site_title'))],
            'encryption' => trim(getSettings('email_encryption')),
            'username' => trim(getSettings('email_user')),
            'password' => trim(getSettings('email_password')),
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

        $settings = Settings::where('variable', $variable)->first();
        /*$settings = Cache::rememberForever('settings_' . $variable, function () use ($variable) {
            return Settings::where('variable', $variable)->first();
        });*/

        if ($settings) {
            return $settings->value;
        } else {

            return false;
        }

    }
}

