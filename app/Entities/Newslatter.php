<?php

namespace ReactorCMS\Entities;

use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Newslatter extends Model
{
    use CacheQueryBuilder;
    //
    protected $table = 'newslatter';
    protected $fillable = ['email'];
}
