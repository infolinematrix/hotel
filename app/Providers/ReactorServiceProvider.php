<?php

namespace ReactorCMS\Providers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeRepository;
use Reactor\Users\Permission;
use Reactor\Users\Role;
use ReactorCMS\Entities\User;

use ReactorCMS\Support\Routing\RouteFilterMaker;


class ReactorServiceProvider extends ServiceProvider
{

    const VERSION = '5.6-alpha.10';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHelpers();

        $this->registerPaths();

        $this->registerFilterMaker();

        $this->registerViewCache();

    }

    
    /**
     * Registers helper methods
     */
    protected function registerHelpers()
    {
        require_once __DIR__ . '/../Support/helpers.php';

        require_once __DIR__ . '/../Html/Builders/snippets.php';
    }

    /**
     * Sets the extension path
     */
    protected function registerPaths()
    {
        $this->app['path.routes'] = base_path('routes');
    }

    /**
     * Registers the filter maker
     */
    protected function registerFilterMaker()
    {
        $this->app->singleton('reactor.routing.filtermaker', function ($app) {
            return new RouteFilterMaker;
        });
    }

    /**
     * Registers the view cache
     */
    protected function registerViewCache()
    {
        $this->app->singleton('reactor.viewcache', function ($app) {
            return $this->app->make('ReactorCMS\Support\ViewCache\ReactorViewCache');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @param NodeRepository $nodeRepository
     */
    public function boot(NodeRepository $nodeRepository)
    {
        $this->registerValidationRules();

        $this->registerViewBindings($nodeRepository);

        $this->registerEventListeners();
    }

    /**
     * Registers validation rules
     */
    protected function registerValidationRules()
    {
        $rules = [
            'not_reserved_name' => 'NotReservedName',
            'date_mysql' => 'DateMysql'
        ];

        foreach ($rules as $name => $rule) {
            Validator::extend($name, 'ReactorCMS\Support\Validation\FormValidator@validate' . $rule);
        }
    }

    /**
     * Registers view bindings
     *
     * @param NodeRepository $nodeRepository
     */
    protected function registerViewBindings(NodeRepository $nodeRepository)
    {
        if (!is_installed()) {
            return;
        }

        if (!is_request_reactor()) {
            $home = $nodeRepository->getHome(false);

            view()->share('home', $home);
        }
        
        view()->composer('*', function ($view) {
            $view->with('currentUser', Auth::guard()->user());
        });

        if (is_request_reactor()) {
            view()->composer('partials.navigation.nodes', function ($view) {
                $leafs = empty($id = auth()->user()->home) ?
                    Node::whereIsRoot()->defaultOrder()->get() :
                    [Node::find($id)];

                $view->with('leafs', $leafs);
            });
        }

    }

    /**
     * Registers event listeners
     * (mostly for view cache model events)
     */
    protected function registerEventListeners()
    {
        User::saved(function ($user) {
            $this->app['reactor.viewcache']
                ->flushKeywords(['userview' . $user->getKey()]);
        });

        foreach (['saved', 'deleted'] as $event) {
            Node::$event(function ($node) {
                $parent = $node->parent;

                while ($parent) {
                    if ($parent->hidesChildren()) {
                        return;
                    }

                    $parent = $parent->parent;
                }

                $this->app['reactor.viewcache']
                    ->flushKeywords(['reactor.views.navigation.nodes']);
            });

            Permission::$event(function ($permission) {
                $this->app['reactor.viewcache']
                    ->flushReactor();
            });

            Role::$event(function ($role) {
                $this->app['reactor.viewcache']
                    ->flushReactor();
            });
        }
    }

}
