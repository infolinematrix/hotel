<?php

namespace ReactorCMS\Entities;

use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use CacheQueryBuilder;
    //
    protected $table = 'subscribers';
    protected $fillable = ['name', 'email', 'city', 'country', 'additional'];
}
