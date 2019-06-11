<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 1/12/17
 * Time: 6:58 PM
 */

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;
use ReactorCMS\Entities\Media;

class Node extends \Reactor\Hierarchy\Node
{
    //use CacheQueryBuilder;


    

    public function meta()
    {
        return $this->hasMany('ReactorCMS\Entities\NodeMeta', 'node_id');
    }

    public function media() { 
        return $this->hasMany('ReactorCMS\Entities\Media', 'node_id');

    }

    /*
    public function reviews()
    {
        return $this->hasMany('Matrix\Reviews\NodeMeta', 'node_id');
    }*/

    

    public function scopeWithTitle(Builder $query, $name, $locale = null)
    {
        return $this->scopeWhereTranslationLike($query, 'title', $name, $locale);
    }


}