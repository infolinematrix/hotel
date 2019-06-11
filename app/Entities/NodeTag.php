<?php

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;


class NodeTag extends Model
{


    public $timestamps = false;
    protected $table = 'node_tag';

    //

    protected $fillable = ['node_id', 'tag_id'];


    public function nodes()
    {
        return $this->hasOne(Node::class, 'id');
    }

    public function scopeByKey(Builder $query, $key)
    {
        return $query->where($this->table . '.key', $key);
    }

}
