<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 23/8/17
 * Time: 1:37 PM
 */

namespace ReactorCMS\Entities;

use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //use CacheQueryBuilder;

    protected $table = 'settings';
    protected $fillable = ['variable', 'value'];
}