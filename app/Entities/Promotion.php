<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29/3/18
 * Time: 1:49 PM
 */

namespace ReactorCMS\Entities;


use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    
    protected $table = 'promotions';

    //

    protected $fillable = ['node_id', 'budget', 'days'];


    public function nodes()
    {
        return $this->hasOne(Node::class, 'id');
    }



}