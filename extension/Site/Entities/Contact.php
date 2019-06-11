<?php

namespace Extension\Site\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contacts';
    protected $fillable = ['node_id','email','first_name','last_name','phone','content'];


    public function nodes()
    {
        return $this->hasOne(Node::class, 'id');
    }

}