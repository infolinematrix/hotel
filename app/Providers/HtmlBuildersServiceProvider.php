<?php

namespace ReactorCMS\Providers;


use Illuminate\Support\ServiceProvider;

class HtmlBuildersServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'reactor.builders.activities',
            'reactor.builders.contents',
            'reactor.builders.forms',
            'reactor.builders.navigation',
            'reactor.builders.nodes'
        ];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerActivitiesHtmlBuilder();
        $this->registerContentsHtmlBuilder();
        $this->registerFormsHtmlBuilder();
        $this->registerNavigationHtmlBuilder();
        $this->registerNodesHtmlBuilder();
    }

    /**
     * Registers activities html builder
     */
    protected function registerActivitiesHtmlBuilder()
    {

        $this->app->singleton('reactor.builders.activities', function ($app) {
            return $this->app->make('ReactorCMS\Html\Builders\ActivitiesHtmlBuilder');
        });
    }

    /**
     * Registers contents html builder
     */
    protected function registerContentsHtmlBuilder()
    {

        $this->app->singleton('reactor.builders.contents', function ($app) {
            return $this->app->make('ReactorCMS\Html\Builders\ContentsHtmlBuilder');
        });
    }

    /**
     * Registers forms html builder
     */
    protected function registerFormsHtmlBuilder()
    {

        $this->app->singleton('reactor.builders.forms', function ($app) {
            return $this->app->make('ReactorCMS\Html\Builders\FormsHtmlBuilder');
        });
    }

    /**
     * Registers navigation html builder
     */
    protected function registerNavigationHtmlBuilder()
    {

        $this->app->singleton('reactor.builders.navigation', function ($app) {
            return $this->app->make('ReactorCMS\Html\Builders\NavigationHtmlBuilder');
        });
    }

    /**
     * Registers navigation html builder
     */
    protected function registerNodesHtmlBuilder()
    {

        $this->app->singleton('reactor.builders.nodes', function ($app) {
            return $this->app->make('ReactorCMS\Html\Builders\NodesHtmlBuilder');
        });
    }

}