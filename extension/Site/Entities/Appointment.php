<?php

namespace Extension\Site\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    
    protected $table = 'appointment';
    protected $fillable = ['node_id','first_name','last_name','email','contact','message','picker_date','picker_time'];


    public function nodes()
    {
        return $this->hasOne(Node::class, 'id');
    }

}
