<?php


namespace ReactorCMS\Html\Forms\Settings;


use Kris\LaravelFormBuilder\Form;

class CreateForm extends Form
{

    /**
     * Form options
     *
     * @var array
     */
    protected $formOptions = [
        'method' => 'POST'
    ];

    public function buildForm()
    {

        if (locale_count() > 1) {
            $locales = [];

            foreach (locales() as $locale) {
                $locales[$locale] = trans('general.' . $locale);
            }

            $this->add('default_language', 'select', [
                'title' => 'Default Language',
                'choices' => $locales,
                'attr' => ['class' => 'select2-no-search']
            ]);
        }

        $this->add('site_mode', 'select', [
            'choices' => ['1' => 'Live', '0' => 'Under maintanence'],
            'label' => 'Site Mode',
            'attr' => ['class' => 'select2-no-search']
        ]);


        $this->add('email_driver', 'select', [
            'choices' => ['SMTP' => 'SMTP', 'MAIL' => 'PHP MAIL'],
            'label' => 'Email Driver',
            'attr' => ['class' => 'select2-no-search']
        ]);

        $this->add('email_host', 'text', [
            'label' => 'Host',
            'rules' => 'required|min:5',
        ]);
        $this->add('email_port', 'text', [
            'label' => 'Port',
            'rules' => 'required|numeric',
        ]);

        $this->add('email_encryption', 'select', [
            'choices' => ['TLS' => 'TLS', 'SSL' => 'SSL'],
            'label' => 'Encryption',
            'attr' => ['class' => 'select2-no-search']
        ]);


        $this->add('email_user', 'text', [
            'label' => 'User',
        ]);
        $this->add('email_password', 'text', [
            'label' => 'Password',
        ]);
        $this->add('email_from_email', 'text', [
            'label' => 'Email From',
        ]);
        $this->add('email_form_name', 'text', [
            'label' => 'From Name',
        ]);


        $this->add('google_map_api', 'text', [
            'label' => 'Google Map Api',
        ]);
        $this->add('google_analytics_api', 'text', [
            'label' => 'Google Analytics',
        ]);
        $this->add('google_ad_pubid', 'text', [
            'label' => 'Adsense Publisher ID',
        ]);


        $this->add('social_facebook', 'text', [
            'label' => 'Facebook Link',
            'rules' => 'URL',
        ]);
        $this->add('social_twitter', 'text', [
            'label' => 'Twitter Link',
            'rules' => 'URL',
        ]);
        $this->add('social_google', 'text', [
            'label' => 'Google Plus',
            'rules' => 'URL',
        ]);
        $this->add('social_linkedin', 'text', [
            'label' => 'LinkedIn',
            'rules' => 'URL',
        ]);
        $this->add('social_pinterest', 'text', [
            'label' => 'Pinterest',
            'rules' => 'URL',
        ]);
        $this->add('social_instagram', 'text', [
            'label' => 'Instagram',
            'rules' => 'URL',
        ]);
        $this->add('social_youtube', 'text', [
            'label' => 'YouTube',
            'rules' => 'URL',
        ]);

        $this->add('site_title', 'text', [
            'label' => 'Site Title',
            'rules' => 'required',
        ]);

        $this->add('site_url', 'text', [
            'label' => 'Web',
            'rules' => 'required',
        ]);

        $this->add('phone', 'text', [
            'label' => 'Phone',
            'rules' => 'required',
        ]);

        $this->add('skype', 'text', [
            'label' => 'Skype',

        ]);


        $this->add('address', 'textarea', [
            'attr' => ['rows' => 2]

        ]);

        $this->add('office_timing', 'text', [
            'label' => 'Office Timing',

        ]);

        $this->add('site_logo', 'file', [
            'label' => false,
            'attr' => ['class' => 'img','accept' => 'image/png, image/jpeg']

        ]);

    }

}