<?php
/**
 * The class for provide version specific api routes
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */
namespace App\Api\v1\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ApiRouteServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //
       parent::boot($router);
    }

    public function map(\Dingo\Api\Routing\Router $api)
    {
        $api->version(['version' => 'v1'], function($api) {
            return require app_path('Api/v1/Http/routes.php');
        });
    }
}
