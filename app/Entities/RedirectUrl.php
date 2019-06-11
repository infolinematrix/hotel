<?php

namespace ReactorCMS\Entities;

use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class RedirectUrl extends Model
{
    public $timestamps = false;
    use CacheQueryBuilder;
    //
    protected $table = 'redirect_url';
    protected $fillable = ['from', 'to'];
}
