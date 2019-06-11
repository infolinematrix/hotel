<?php

namespace extension\Site\Html\Forms;

use Kris\LaravelFormBuilder\Form;

class localeForm extends Form
{


    public function buildForm()
    {

        if (locale_count() > 1) {
            $locales = [];

            foreach (locales() as $locale) {
                $locales[$locale] = trans('general.' . $locale);
            }

            $this->add('locale', 'choice', [
                'label' => '_Language',
                'rules' => ['required'],
                'choices' => $locales,
                'selected' => env('REACTOR_LOCALE'),
                'attr' => [
                    'class' => 'select2'
                ]
            ]);

        }

    }
}