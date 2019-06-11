<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29/3/18
 * Time: 1:49 PM
 */

namespace ReactorCMS\Entities;


class Media extends \Reactor\Documents\Media\Media
{


    public function nodes()
    {
        return $this->hasOne(Node::class, 'id');
    }

}