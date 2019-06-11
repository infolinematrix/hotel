<?php
namespace Extension\Site\Helpers;

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 6/11/14
 * Time: 6:21 PM
 */

class Parser
{

    public $l_delim = '{';
    public $r_delim = '}';
    public $object;

    public function __construct()
    {

    }

    public static function parse_string($template, $data)
    {
        return static::_parse($template, $data);
    }

    public static function _parse($template, $data)
    {
        if ($template == '') {
            return FALSE;
        }

        foreach ($data as $key => $val) {
            if (is_array($val)) {
                $template = static::_parse_pair($key, $val, $template);
            } else {
                $template = static::_parse_single($key, (string)$val, $template);
            }
        }

        return $template;
    }


    public static function _parse_single($key, $val, $string)
    {
        return str_replace('{' . $key . '}', $val, $string);
    }

    public function _parse_pair($variable, $data, $string)
    {
        if (FALSE === ($match = _match_pair($string, $variable))) {
            return $string;
        }

        $str = '';
        foreach ($data as $row) {
            $temp = $match['1'];
            foreach ($row as $key => $val) {
                if (!is_array($val)) {
                    $temp = _parse_single($key, $val, $temp);
                } else {
                    $temp = _parse_pair($key, $val, $temp);
                }
            }

            $str .= $temp;
        }

        return str_replace($match['0'], $str, $string);
    }

    public function _match_pair($string, $variable)
    {
        if (!preg_match("|" . preg_quote($this->l_delim) . $variable . preg_quote($this->r_delim) . "(.+?)" . preg_quote($this->l_delim) . '/' . $variable . preg_quote($this->r_delim) . "|s", $string, $match)) {
            return FALSE;
        }

        return $match;
    }

} 