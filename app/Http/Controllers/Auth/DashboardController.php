<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 22/10/18
 * Time: 2:40 PM
 */

namespace ReactorCMS\Http\Controllers\Auth;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use ReactorCMS\Http\Controllers\Controller;

class DashboardController extends Controller
{


    public function __construct()
    {
    }

    public function index(){

        dd("User dashboard");
    }



}