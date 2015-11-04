<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Not work
Route::api(['version' => 'v1', 'prefix' => 'api'], function () {
    Route::get('users', function () {
        return User::all();
    });
});

Route::api(['version' => 'v2', 'prefix' => 'api'], function () {
    Route::get('users', function () {
        return User::find(1);
    });
});

Route::get('/users', function () {
    $users = API::version('v1')->get('users');
    dd($users);
});
*/

/*
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
      $api->get('user', ['middleware' => 'api.auth', function () {
      // This route requires authentication.
      }]);

      $api->get('posts', function () {
      // This route does not require authentication.
      });
    $api->get('users', ['as' => 'api.users.index', 'uses' => 'App\Http\Controllers\Api\v1\Controllers\UserController@index']);
    $api->get('users/{id}', ['as' => 'api.users.show', 'uses' => 'App\Http\Controllers\Api\v1\Controllers\UserController@show']);
});

app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('api.users.index');
app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('api.users.show');
*/