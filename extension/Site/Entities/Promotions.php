<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 12/11/18
 * Time: 12:43 PM
 */

namespace Extension\Site\Entities;


use Illuminate\Database\Eloquent\Model;
use Reactor\Hierarchy\Node;

class Promotions extends Model
{

    protected $table = 'promotions';
    protected $fillable = ['node_id', 'txn_id', 'node_id', 'clicked', 'cpc','max_clicks'];

    public function node()
    {
        return $this->belongsTo(Node::class, 'node_id');
    }
}