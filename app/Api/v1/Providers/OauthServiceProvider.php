<?php
/**
 * The class for providing Oauth service provider
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */
namespace App\Api\v1\Providers;


use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\OAuth2;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class OauthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['api.auth']->extend('oauth', function ($app) {

            $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker(), false);

            $provider->setUserResolver(function ($id) {
                // Logic to return a user by their ID.
                return User::findOrFail($id);
            });

            $provider->setClientResolver(function ($id) {
                // Logic to return a client by their ID.
                return User::findOrFail($id);
            });

            return $provider;
        });
        /*
          $this->app[Auth::class]->extend('oauth', function ($app) {
          $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker());

          $provider->setUserResolver(function ($id) {
          // Logic to return a user by their ID.
          return App\User::findOrFail($id);
          });

          $provider->setClientResolver(function ($id) {
          // Logic to return a client by their ID.
          return App\User::findOrFail($id);
          });

          return $provider;
          });
         * 
         */
    }

    public function register()
    {
        //
    }
}
