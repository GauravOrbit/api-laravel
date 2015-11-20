<?php
/**
 * Route to get access token
 *
 * @param  grant_type=password
 *         client_id=f3d259ddd3ed8ff3843839b
 *         client_secret=4c7f6f8fa93d59c45502c0ae8c4a95b
 *         username=api_user
 *         password=api
 *         // http://localhost/api-laravel/public/api/oauth/access_token?grant_type=password&client_id=web&client_secret=4c7f6f8fa93d59c45502c0ae8c4a95b&username=api_user&password=api
 * @return token contain json data
 */

$api->post('oauth/access_token', function() {
    // User try to login or registered
    $accessToken = \Authorizer::issueAccessToken();
    // $user_id = \Authorizer::getResourceOwnerId();
    return \Response::json($accessToken);
});

$api->post('refresh-token', function() {
    // User try to login or registered
    $accessToken = \Authorizer::issueAccessToken();
    // $user_id = \Authorizer::getResourceOwnerId();
    return \Response::json($accessToken);
});

/**
 * Route list those must require authentications
 */
$api->group(['middleware' => 'api.auth'], function($api) {
    /**
     * Get current loggedin User with api access
     */
    $api->get('user', function () {
        $user = app('Dingo\Api\Auth\Auth')->user();
        return $user;
    });

    /**
     * Route to retrive Users List data
     */
    $api->get('users', ['as' => 'api.users.index', 'uses' => 'App\Api\v1\Http\Controllers\UserController@index']);

    /**
     * Route to get single user
     */
    $api->get('users/{id}', ['as' => 'api.users.show', 'uses' => 'App\Api\v1\Http\Controllers\UserController@show']);

    /**
     * Get data of multi api calls within single call request
     */
    $api->post('getdata', ['as' => 'api.calls.getdata', 'uses' => 'App\Api\v1\Http\Controllers\CallsController@getData']);
});

/*
$api->version('v1', function ($api) {
    $api->get('users', ['as' => 'api.users.index', 'uses' => 'UserController@index']);
    $api->get('users/{id}', ['as' => 'api.users.show', 'uses' => 'UserController@show']);
});
*/
/*
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