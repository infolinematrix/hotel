<?php


namespace ReactorCMS\Http\Controllers;


use Reactor\Users\Permission;
use ReactorCMS\Http\Controllers\Traits\BasicResource;
use ReactorCMS\Http\Controllers\Traits\UsesPermissionForms;

class PermissionsController extends ReactorController
{

    use BasicResource, UsesPermissionForms;

    /**
     * Names for the BasicResource trait
     *
     * @var string
     */
    protected $modelPath = Permission::class;
    protected $resourceMultiple = 'permissions';
    protected $resourceSingular = 'permission';
    protected $permissionKey = 'PERMISSIONS';

}