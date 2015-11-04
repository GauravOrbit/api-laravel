<?php
/**
 * The class for Verifying Oauth user for password Grant
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */
namespace App\Api\v1\Oauth2\Verifier;

use Auth;
use DB;
use \Illuminate\Support\Facades\Hash;

class OauthVerifier {

    public function verify($username, $password) {
        // prep credentials
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        //Perform Auth specific check
        if (Auth::once($credentials)) {
            return Auth::user()->id;
        } else {
            return false;
        }

        // perform table specific check
        $user = DB::table('users')
                ->where('users.email', $credentials['email'])
                ->first();

        // found a user returning an ID
        if ($user) {
            // passwords match?
            if (Hash::check($credentials['password'], $user->password)) {
                return $user->id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
