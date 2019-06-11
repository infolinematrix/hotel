<?php
namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Model;

class OAuthProvider extends User
{
    //
    protected $table = 'users_social';
    protected $fillable = ['user_id','provider','provider_user_id','access_token'.'refresh_token' ];


    
}

