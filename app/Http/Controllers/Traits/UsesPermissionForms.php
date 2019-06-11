<?php

namespace ReactorCMS\Http\Controllers\Traits;


use Illuminate\Http\Request;
use Reactor\Users\Permission;

trait UsesPermissionForms {

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getCreateForm()
    {
        return $this->form('ReactorCMS\Html\Forms\Permissions\CreateEditForm', [
            'method' => 'POST',
            'url'    => route('reactor.permissions.store')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateCreateForm(Request $request)
    {
        $this->validateForm('ReactorCMS\Html\Forms\Permissions\CreateEditForm', $request);
    }

    /**
     * @param $id
     * @param Permission $permission
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, Permission $permission)
    {
        return $this->form('ReactorCMS\Html\Forms\Permissions\CreateEditForm', [
            'method' => 'PUT',
            'url'    => route('reactor.permissions.update', $id),
            'model'  => $permission
        ]);
    }

    /**
     * @param Request $request
     * @param Permission $permission
     */
    protected function validateEditForm(Request $request, Permission $permission)
    {
        $this->validateForm('ReactorCMS\Html\Forms\Permissions\CreateEditForm', $request, [
            'name' => ['required', 'max:255',
                'unique:permissions,name,' . $permission->getKey(),
                'regex:/^(ACCESS|EDIT|SITE|REACTOR)(_([A-Z]+))+$/']
        ]);
    }

}