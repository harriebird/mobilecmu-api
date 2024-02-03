<?php

use App\User;
// use JWTAuth;
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

// Route::get('/', function () {
//   return view('welcome');
// });

// Route::group(['middleware' => 'cors', 'prefix' => 'api'], function($response) {
Route::group(['middleware' => 'cors'], function($response) {
  Route::get('/', function() {
    return response()->json(['message' => 'welcome_to_mobilecmu_api'], 200);
  });
  Route::post('auth', 'AuthController@login');
  // Route::resource('auth', 'AuthController',['only' => ['index']]);
  Route::get('auth/stud', 'AuthController@getAuthenticatedUser');
  Route::get('logout', 'AuthController@logout');

  // Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function() {
  Route::group(['middleware' => ['jwt.auth', 'idfil']], function() {
    Route::get('students/{id}', 'StudCtrl@getInfo');
    Route::get('picture/{id}', 'StudCtrl@getPic');
    Route::get('grades/{id}/{sem}', 'GradesCtrl@getSemGrades');
    // Route::get('grades/{id}', 'GradesCtrl@getGrades');
    // Route::get('grades/{id}/inc', 'GradesCtrl@getIncGrades');
    Route::get('semesters/{id}', 'SemCtrl@getSems');
    // Route::get('evaluation/{id}/{sem}', 'EvalCtrl@getSubs');
    // Route::get('evalsems', 'SemCtrl@getEvalSems');
    Route::get('corinfo/{id}/{sem}', 'CorCtrl@getCorInfo');
    Route::get('corload/{id}/{sem}', 'CorCtrl@getCorLoad');
    Route::get('corcharge/{id}/{sem}', 'CorCtrl@getCorCharge');
    Route::get('ledger/{id}/{sem}', 'LedgerCtrl@getLedgerInfo');
  });
});
