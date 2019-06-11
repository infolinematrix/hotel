<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 22/8/17
 * Time: 4:08 PM
 */

namespace ReactorCMS\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\Form;
use ReactorCMS\Entities\Settings;

trait  UseSettingsForm
{

    protected function getCreateForm()
    {
        $form = $this->form('ReactorCMS\Html\Forms\Settings\CreateForm', [
            'url' => route('reactor.settings.store'),
            'model' => $this->getSource(),
            'files' => true
        ]);


        return $form;
    }

    protected function getSource()
    {
        $s = Settings::pluck('value', 'variable');
        return $s->toArray();
    }

    /**
     * @param Request $request
     */
    protected function validateSettingsCreateForm(Request $request)
    {
        $this->validateForm('ReactorCMS\Html\Forms\Settings\CreateForm', $request);
    }

    protected function save($request)
    {

        dd($request);
    }
}