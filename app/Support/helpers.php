<?php

use Reactor\Documents\Media\Media;
use ReactorCMS\Entities\Node;
use Reactor\Hierarchy\NodeType;



if (!function_exists('getCustomField')) {

    function getCustomField($array)
    {
        if (empty($array) || $array == '') {
            return null;
        }

        $get_last_node_id = end($array);
        $cform_name = Node::find($get_last_node_id)->custom_form;


        if ($cform_name) {
            $node_type = NodeType::where('name', $cform_name)->first();

            return $node_type->id;
        } else {
            return null;
        }
    }
}

if (!function_exists('get_package_version')) {
    /**
     * @param string $packageName
     * @return string
     */
    function get_package_version($packageName)
    {
        $file = get_include_path().'/../composer.lock';
        $packages = json_decode(file_get_contents($file), true)['packages'];
        foreach ($packages as $package) {
            if ($package['name'] == $packageName) {
                return $package['version'];
            }
        }

        return null;
    }
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

if (!function_exists('validate_init_package')) {

    function validate_init_package($package_name)
    {
        if ($package_name || $package_name == '') {
            $config = config($package_name);
            if ($config['title'] = '') {
                return false;
            }
        }
    }
}

if (!function_exists('get_node_type')) {

    function get_node_type($type_name)
    {

        if ($type_name || $type_name == '') {

            $type = \Reactor\Hierarchy\NodeType::where('name', trim($type_name))->first();
            if (count([$type]) == 0) {
                flash('Opps! Node Type not found.. ' . $type_name);
                return redirect()->back();
            } else {
                return $type;
            }
        }
    }
}

if (!function_exists('plainText')) {
    /**
     * Get Sites layouts list with name
     * Developed by : Subha Sundar Das (10-june-2017)
     */
    function plainText($str = '', $limit = 100)
    {
        $txt = str_limit(strip_tags($str), $limit);
        return $txt;
    }
}

if (!function_exists('getSiteLayouts')) {
    /**
     * Get Sites layouts list with name
     * Developed by : Subha Sundar Das (10-june-2017)
     * @return layout name
     */
    function getSiteLayouts()
    {
        $layouts = [];

        $files = glob(base_path() . '/resources/views/site/layout/*.blade.php');

        foreach ($files as $key => $value) {

            $file = basename($value, ".blade.php");

            if ($file != 'base') {

                $layouts[$file] = str_studly($file);
            }
        }

        return $layouts;
    }
}


if (!function_exists('locale')) {
    /**
     * Checks if Nuclear is installed
     *
     * @return bool
     */
    function locale()
    {
        $loc = 'en';
        /*if (session()->get('_locale')) {
            $loc = session()->get('_locale');
        }*/
        $loc = App::getLocale();
        return $loc;
    }
}

if (!function_exists('currency_format')) {
    /**
     * Checks if Nuclear is installed
     *
     * @return bool
     */
    function currency_format($string)
    {
        return number_format($string, 2, '.', ',');
    }
}
if (!function_exists('date_format')) {
    /**
     * Checks if Nuclear is installed
     *
     * @return bool
     */
    function date_format($date, $style = 'd M, Y')
    {
        $dt = '00:00:0000 00:00:00';
        $dt = date(strtotime($date), $style);
        return $dt;
    }
}


if (!function_exists('node_status')) {
    /**
     * Node Status text
     */
    function node_status($status_code)
    {
        $choices = [
            50 => trans('nodes.published'),
            30 => trans('nodes.draft'),
            40 => trans('nodes.pending'),
            60 => trans('nodes.archived')
        ];

        return $choices[$status_code];

        return ((env('APP_STATUS', 'INSTALLED') === 'INSTALLED') && !empty(env('DB_DATABASE')));
    }
}

if (!function_exists('is_installed')) {
    /**
     * Checks if Nuclear is installed
     *
     * @return bool
     */
    function is_installed()
    {

        return ((env('APP_STATUS', 'INSTALLED') === 'INSTALLED') && !empty(env('DB_DATABASE')));
    }
}

if (!function_exists('is_request_reactor')) {
    /**
     * Checks if the request is a reactor request
     *
     * @return bool
     */
    function is_request_reactor()
    {
        return (request()->segment(1) === config('app.reactor_prefix'));
    }
}

if (!function_exists('is_request_install')) {
    /**
     * Checks if the request is a reactor request
     *
     * @return bool
     */
    function is_request_install()
    {
        return (request()->segment(1) === 'install');
    }
}

if (!function_exists('nuclear_version')) {
    /**
     * Returns the current nuclear version
     *
     * @return int
     */
    function nuclear_version()
    {
        return ReactorCMS\Providers\ReactorServiceProvider::VERSION;
    }
}

if (!function_exists('PackageExist')) {
    function PackageExist($name)
    {

        // Check if the path to this file contains 'package'
        $path = base_path('packages/Matrix/' . $name);

        if (file_exists($path) == false) {
            return false;
        }


        // If not, it's in package folder
        return true;
    }
}

if (!function_exists('routes_path')) {
    /**
     * Returns the routes path
     *
     * @param string $path
     * @return string
     */
    function routes_path($path = '')
    {
        return app()->make('path.routes') . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('uppercase')) {
    /**
     * Converts string to uppercase depending on the language
     * This helper mainly resolves the issue for Turkish i => İ
     * This should otherwise be done with CSS
     *
     * @param string $string
     * @param string $locale
     * @return string
     */
    function uppercase($string, $locale = null)
    {
        $locale = $locale ?: App::getLocale();

        if ($locale === 'tr') {
            return mb_strtoupper(str_replace('i', 'İ', $string), 'UTF-8');
        }

        return mb_strtoupper($string, 'UTF-8');
    }
}

if (!function_exists('get_full_locale_for')) {
    /**
     * Returns the locale count of the app
     *
     * @param string $locale
     * @param bool $trim
     * @return string
     */
    function get_full_locale_for($locale, $trim = false)
    {
        $locale = config('translatable.full_locales.' . $locale);

        return $trim ? rtrim($locale, '.UTF-8') : $locale;
    }
}

if (!function_exists('route_parameter')) {
    /**
     * Getter for the translated slug
     *
     * @param string $key
     * @param string $locale
     * @return string
     */
    function route_parameter($key, $locale = null)
    {
        return app('reactor.routing.filtermaker')->getRouteParameterFor($key, $locale);
    }
}

if (!function_exists('get_route_parameter_for')) {
    /**
     * Alias for route_parameter
     *
     * @deprecated
     *
     * @param string $key
     * @param string $locale
     * @return string
     */
    function get_route_parameter_for($key, $locale = null)
    {
        return route_parameter($key, $locale);
    }
}

if (!function_exists('is_route_parameter')) {
    /**
     * Checks if the given key is a route parameter
     *
     * @param string $key
     * @return bool
     */
    function is_route_parameter($key)
    {
        return app('reactor.routing.filtermaker')->isRouteParameter($key);
    }
}

if (!function_exists('set_app_locale_with')) {
    /**
     * Sets the app locale with given key and slug
     *
     * @param string $key
     * @param string $slug
     */
    function set_app_locale_with($key, $slug)
    {
        app('reactor.routing.filtermaker')->setAppLocaleWith($key, $slug);
    }
}

if (!function_exists('cached_view')) {
    /**
     * Returns a view either from cache or generating it fresh then caching it
     *
     * @param string $view
     * @param array $params
     * @param array $keywords
     * @param int $user
     * @param string $key
     * @param int $time
     * @return string
     */
    function cached_view($view, array $params = [], array $keywords = ['reactor.views'], $user = null, $key = null, $time = null)
    {
        return app('reactor.viewcache')->getView($view, $params, $keywords, $user, $key, $time);
    }
}

if (!function_exists('cached_view_modules')) {
    /**
     * Returns the modules view
     *
     * @return string
     */
    function cached_view_modules()
    {
        return app('reactor.viewcache')->getModulesView();
    }
}

if (!function_exists('cached_view_nodes')) {
    /**
     * Returns the nodes view
     *
     * @return string
     */
    function cached_view_nodes()
    {
        return app('reactor.viewcache')->getNodesView();
    }
}