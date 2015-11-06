<?php
/**
 * The class for Verifying Oauth user for Mobile Grant
 *
 * It requires to create attribute in user model name : phone
 * It requires to create attribute in user model name : country_code
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */
namespace App\Api\v1\Oauth2\Verifier;

use Auth;
use DB;
use Log;
use Exception;

class OauthMobileVerifier {

    /**
     * callback function of OAuth returning access_token on login or register
     * @param string $countryCode
     * @param string $phone     
     * @param int $otp     
     * @param string $firstname     
     * @param string $lastname     
     * @return json access_token 
     */
    public function verify($countryCode, $phone, $otp, $name, $email)
    {
        //check if phone no exists and user is active. then verify sended OTP and then return user
        // perform table specific check
        $user = DB::table('users')
            ->where('users.country_code', $countryCode)
            ->where('users.phone', $phone)
            ->where('users.name', $name)
            ->where('users.email', $email)
            ->first();

        // found a user returning an ID
        if ($user) {
           return $user->id;
        } else {
            return false;
        }
    }
}