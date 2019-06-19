<?php

Route::group([
    'prefix' => config('app.reactor_prefix'),
    'middleware' => ['setTheme:' . config('themes.active_reactor')]
], function () {

    // Authenticated reactor
    require 'reactor/auth.php';

    Route::group(['middleware' => ['auth:admin', 'can:ACCESS_REACTOR']], function () {

        require 'reactor/dashboard.php';
        require 'reactor/documents.php';
        require 'reactor/mailings.php';
        require 'reactor/maintenance.php';
        require 'reactor/nodes.php';
        require 'reactor/nodetypes.php';
        require 'reactor/permissions.php';
        require 'reactor/profile.php';
        require 'reactor/roles.php';
        require 'reactor/tags.php';
        require 'reactor/update.php';
        require 'reactor/users.php';
        require 'reactor/pages.php';
        require 'reactor/blogs.php';
        require 'reactor/settings.php';
        require 'reactor/reviews.php';
    });

// Application/Extension reactor
    Route::group(['middleware' => ['auth:admin', 'can:ACCESS_REACTOR']], function () {

        foreach (glob(routes_path() . '/extension/*.php') as $filename) {

            require $filename;
        }
    });
    
});