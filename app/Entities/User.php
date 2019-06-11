<?php

namespace ReactorCMS\Entities;

use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends \Reactor\Users\User implements JWTSubject
{
    //use CacheQueryBuilder;

    //
    protected $table = 'users';
    protected $fillable = ['email', 'password', 'first_name', 'last_name', 'type', 'status'];

    public function isAdmin()
    {
        return $this->hasRole('ADMINISTRATOR') || $this->hasPermission('ADMINISTRATOR');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function nodes()
    {
        return $this->hasMany(Node::class, 'user_id');
    }

    public function user_social()
    {
        return  $this->hasOne(OAuthProvider::class);
    }

}
