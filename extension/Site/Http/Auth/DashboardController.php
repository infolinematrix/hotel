<?php

namespace Extension\Site\Http\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nuclear\Users\HasRoles;
use Nuclear\Users\Role;

use Illuminate\Support\Facades\Event;
use App\Events\SendMail;

use Reactor\Http\Controllers\PublicController;
use Nuclear\Users\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Reactor\Http\Controllers\Traits\BasicResource;
use DaveJamesMiller\Breadcrumbs\Facade as Breadcrumbs;
use App\Entities\Node;
use Kenarkose\Files\Media\Media;


class DashboardController extends PublicController
{

    use BasicResource;


    public function __construct()
    {

    }


    public function dashboard()
    {

        return $this->compileView('Site::auth.dashboard', compact('media'), 'Member Area');
    }

}