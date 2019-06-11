<?php


namespace ReactorCMS\Http\Controllers\Traits;


use Illuminate\Http\Request;
use Reactor\Hierarchy\Mailings\Subscriber;

trait UsesSubscriberForms {

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getCreateForm()
    {
        return $this->form('ReactorCMS\Html\Forms\Subscribers\CreateEditForm', [
            'method' => 'POST',
            'url'    => route('reactor.subscribers.store')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateCreateForm(Request $request)
    {
        $this->validateForm('ReactorCMS\Html\Forms\Subscribers\CreateEditForm', $request);
    }

    /**
     * @param int $id
     * @param Subscriber $subscriber
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, Subscriber $subscriber)
    {
        return $this->form('ReactorCMS\Html\Forms\Subscribers\CreateEditForm', [
            'method' => 'PUT',
            'url'    => route('reactor.subscribers.update', $id),
            'model'  => $subscriber
        ]);
    }

    /**
     * @param Request $request
     * @param Subscriber $subscriber
     */
    protected function validateEditForm(Request $request, Subscriber $subscriber)
    {
        $this->validateForm('ReactorCMS\Html\Forms\Subscribers\CreateEditForm', $request, [
            'email' => 'required|email|max:255|unique:subscribers,email,' . $subscriber->getKey()
        ]);
    }

}