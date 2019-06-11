<?php

namespace ReactorCMS\Entities;

use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use CacheQueryBuilder;
    //
    protected $table = 'testimonial';
    protected $fillable = ['name', 'email', 'title', 'content', 'status'];
}
