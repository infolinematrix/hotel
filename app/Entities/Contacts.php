<?php

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;
use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use CacheQueryBuilder;
    //
    protected $table = 'contacts';
    protected $fillable = ['prefix', 'name', 'email', 'phone', 'content', 'status'];
}
