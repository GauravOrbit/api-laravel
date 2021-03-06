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
use App\User;
use App\Api\v1\Http\Transformers\UserTransformer;

/**
 * Class UserController
 */
class UserController extends BaseApiController
{
    public function __construct()
    {
        //$this->middleware('api.auth');
    }

    /**
	 * @return mixed
	 */
	public function index()
    {
        $users = User::all();

        return $this->response->collection($users, new UserTransformer);
    }

    /**
     * @return mixed
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->response->array($user->toArray());
    }
}