<?php

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;


class NodeMeta extends Model
{


    public $timestamps = false;
    protected $table = 'node_meta';

    //

    protected $fillable = ['node_id', 'type', 'key', 'value'];


    public function nodes()
    {
        return $this->hasOne(Node::class, 'id');
    }

    public function scopeByKey(Builder $query, $key)
    {
        return $query->where($this->table . '.key', $key);
    }

}
