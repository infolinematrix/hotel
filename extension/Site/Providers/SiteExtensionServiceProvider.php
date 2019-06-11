<?php


namespace Extension\Site\Providers;


use Illuminate\Routing\Router;
use Illuminate\Support\Facades\View;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Blade;
use Illuminate\Support\ServiceProvider;


class SiteExtensionServiceProvider extends ServiceProvider {




    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
        $this->registerLocalPackages();
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadTranslationsFrom(dirname(__DIR__) . '/lang', 'site');
        $this->blade_directive();
        $this->register_view_path();
        $this->register_helpers();
        $this->register_view_composer();
        $this->registerLocalPackages();
        
        $this->mergeConfigFrom(dirname(__DIR__) . '/Config/extension.php', 'site');
        $this->loadTranslationsFrom(dirname(__DIR__) . '/Lang', 'site');
    }


    public function register_view_composer(){

        // Using class based composers...
        view()->composer(
            '*', 'Extension\Site\Http\Composer\SiteComposer'
        );

        view()->composer(
            'backend.partials.sidebar', 'Extension\Site\Http\Composer\AdminMenuComposer'
        );

    }
    /**
     * Register Views path
     * by: Subha Sundar Das
     */
    public function register_view_path(){
        /* register */

        View::addNamespace('Site', dirname(__DIR__).'/Resources/Views');


        $sourcePath = dirname(__DIR__).'/Resources/Views';

        $viewPath = base_path('resources/views/site/resource/views');

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom([$viewPath, $sourcePath], 'Site');

    }


    protected function registerLocalPackages()
    {
        /**
         * Loader for registering facades.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
     
        /*
         * Load third party local providers
         * $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
         */

   	    //$this->app->register(\Matrix\Article\ArticleServiceProvider::class);

        /*
         * Load third party local aliases
         * $loader->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);
         */
    }


    /**
     * Register Helper files
     * by: Subha Sundar Das
     */
    public function register_helpers(){
        foreach (glob(dirname(__DIR__).'/Helpers/*.php') as $filename) {
            require_once($filename);
        }
    }

    /**
     * Blade Directive
     * by: Subha Sundar Das
     */
    public function blade_directive(){
        /*
        * Laravel dd() function.
        *
        * Usage: @dd($variableToDump)
        */
        Blade::directive('dd', function ($expression) {
            return "<?php dd(with{$expression}); ?>";
        });

        /*
         * php explode() function.
         *
         * Usage: @explode($delimiter, $string)
         */
        Blade::directive('explode', function ($argumentString) {
            list($delimiter, $string) = $this->getArguments($argumentString);
            return "<?php echo explode({$delimiter}, {$string}); ?>";
        });

        /*
         * php implode() function.
         *
         * Usage: @implode($delimiter, $array)
         */
        Blade::directive('implode', function ($argumentString) {
            list($delimiter, $array) = $this->getArguments($argumentString);
            return "<?php echo implode({$delimiter}, {$array}); ?>";
        });

        /*
         * Symfony dump() function.
         *
         * Usage: @dump($variableToDump)
         */
        Blade::directive('dump', function ($expression) {
            return "<?php dump(with{$expression}); ?>";
        });

        /*
         * Set variable.
         *
         * Usage: @set($name, value)
         */
        Blade::directive('set', function ($argumentString) {
            list($name, $value) = $this->getArguments($argumentString);
            return "<?php {$name} = {$value}; ?>";
        });

        /*
         * Truncate string
         *
         * Usage: @truncate($string , integer)
         */
        Blade::directive('truncate', function ($expression) {
            list($string, $length) = $this->getArguments($expression);
            return "<?php echo e(strlen({$string}) > {$length} ? substr({$string},0,{$length}).'...' : {$string}); ?>";
        });
    }

    /**
     * Get argument array from argument string.
     *
     * @param string $argumentString
     * @param bool   $removeQuote
     *
     * @return array
     */
    private function getArguments($argumentString, $removeQuote = false)
    {
        $replace = $removeQuote === true ? ['(', ')', '\''] : ['(', ')'];
        return explode(', ', str_replace($replace, '', $argumentString));
    }



}
