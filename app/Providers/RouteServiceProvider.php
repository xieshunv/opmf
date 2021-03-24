<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $pmNamespace = 'App\Http\Controllers\Pm';
    protected $applyNamespace = 'App\Http\Controllers\Apply';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->applyRoutes();
        $this->pmRoutes();
        $this->commonRoutes();
    }

    /**
     * loading pm route file
     */
    protected function pmRoutes()
    {
        Route::middleware('web')
            ->namespace($this->pmNamespace)
            ->group(base_path('routes/pm.php'));
    }

    /**
     * loading apply route file
     */
    protected function applyRoutes()
    {
        Route::middleware('web')
            ->namespace($this->applyNamespace)
            ->group(base_path('routes/apply.php'));
    }

    /**
     * loading routes route file
     */
    protected function commonRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/common.php'));
    }
}
