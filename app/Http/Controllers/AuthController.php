<?php

namespace App\Http\Controllers;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
  /**
   * API Login, on success return JWT Auth token
   *
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(Request $request) {
      $credentials = $request->only('email', 'password');
      // return $credentials;

      try {
          // attempt to verify the credentials and create a token for the user
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'invalid_credentials'], 401);
          }
      } catch (JWTException $e) {
          // something went wrong whilst attempting to encode the token
          return response()->json(['error' => 'could_not_create_token'], 500);
      }

      // all good so return the token
      return response()->json(compact('token'));
  }


  /**
   * Log out
   * Invalidate the token, so user cannot use it anymore
   * They have to relogin to get a new token
   *
   * @param Request $request
   */
  public function logout(Request $request) {
      $this->validate($request, [
          'token' => 'required'
      ]);

      JWTAuth::invalidate($request->input('token'));
  }

  public function getAuthenticatedUser() {
    try {
      if (! $user = JWTAuth::parseToken()->authenticate()) {
        return response()->json(['error' => 'user_not_found'], 404);
      }
    }
    catch (JWTException $e) {
      if ($e instanceof TokenExpiredException) {
        return response()->json(['error' => 'token_expired'], $e->getStatusCode());
      } else if ($e instanceof TokenBlacklistedException) {
        return response()->json(['error' => 'token_blacklisted'], $e->getStatusCode());
      } else if ($e instanceof TokenInvalidException) {
        return response()->json(['error' => 'token_invalid'], $e->getStatusCode());
      } else if ($e instanceof PayloadException) {
        return response()->json(['error' => 'token_expired'], $e->getStatusCode());
      } else if ($e instanceof JWTException) {
        return response()->json(['error' => 'token_invalid'], $e->getStatusCode());
      }
    }
    // the token is valid and we have found the user via the sub claim
    return response()->json(compact('user'));
  }
  public function index() {
    return "Auth index";
  }
}
