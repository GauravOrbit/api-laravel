<?php
/**
 * The class for User api calls 
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */
namespace App\Api\v1\Http\Controllers;

use App\Api\v1\Http\Controllers\BaseApiController;
use Route;
use Dingo\Api\Routing\UrlGenerator;

/**
 * Class UserController
 */
class CallsController extends BaseApiController
{

    public function __construct()
    {
        //$this->middleware('api.auth');
    }

    /**
	 * @return mixed
	 */
	public function getData()
    {
        $params = [];
        $params[0] = ['namespace' => 'App\Api\v1\Http\Controllers', 'route' => 'user', 'params' => ['id', 'name']];

        //$action_name = $this->router->getRoutes()->match($request)->getActionName();
        //$params = \Input::get('params');

        $params = \URL::route("api.users.show", [], false);
        /*
          $route = new \Illuminate\Routing\Route($params);
          $route->getActionName(); // Returns App\Http\Controllers\MyController@myAction
          $route->getAction();
         * 
         */
        //$params = app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('api.users.index');
        //$params = app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('api.users.index');

        //works and need to utilize
        $dispatcher = app('Dingo\Api\Dispatcher')->version('v1')->get('api/users');
        $params = $dispatcher;

        return $params;
    }
}