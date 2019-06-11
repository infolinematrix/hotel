<?php

namespace ReactorCMS\Entities;

use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use CacheQueryBuilder;
    //
    protected $table = 'messages';
    protected $fillable = ['node_id', 'name', 'email', 'contact', 'qty', 'message'];
}
