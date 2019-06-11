<?php

namespace ReactorCMS\Http\Controllers\Traits;


use Illuminate\Http\Request;
use Reactor\Users\Role;
use Reactor\Users\User;

trait UsesUserForms {

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getCreateForm()
    {
        return $this->form('ReactorCMS\Html\Forms\Users\CreateForm', [
            'url' => route('reactor.users.store')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateCreateForm(Request $request)
    {
        $this->validateForm('ReactorCMS\Html\Forms\Users\CreateForm', $request);
    }

    /**
     * @param int $id
     * @param User $user
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, User $user)
    {
        $form = $this->form('ReactorCMS\Html\Forms\Users\EditForm', [
            'url'   => route('reactor.users.update', $id),
            'model' => $user
        ]);

        $form->add('home', 'node');

        return $form;
    }

    /**
     * @param Request $request
     * @param User $user
     */
    protected function validateEditForm(Request $request, User $user)
    {
        $this->validateForm('ReactorCMS\Html\Forms\Users\EditForm', $request, [
            'email' => 'required|email|max:255|unique:users,email,' . $user->getKey()
        ]);
    }

    /**
     * @param int $id
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getPasswordForm($id)
    {
        return $this->form('ReactorCMS\Html\Forms\Users\PasswordForm', [
            'url' => route('reactor.users.password.post', $id),
        ]);
    }

    /**
     * Creates a form for adding permissions
     *
     * @param int $id
     * @param User $user
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getAddRoleForm($id, User $user)
    {
        $form = $this->form('ReactorCMS\Html\Forms\Roles\AddRoleForm', [
            'url' => route('reactor.users.roles.associate', $id)
        ]);

        $choices = Role::all()
            ->diff($user->roles)
            ->pluck('label', 'id')
            ->toArray();

        $form->modify('role', 'select', [
            'choices' => $choices
        ]);

        return [$form, count($choices)];
    }

}