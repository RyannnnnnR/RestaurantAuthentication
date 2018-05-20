<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group(['middleware' => 'log'], function() {

Route::post('/login', function(){
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        return response()->json(['success' => $success],  200);
    }
    else{
        return response()->json(['error'=>'Unauthorised - Invalid login credentials'], 401);
    }
});
//Users have to be logged in to execute requests
Route::group(['middleware' => 'auth:api'], function() {
    //Route to test semantics
    Route::get('/signout', function(){
        $user = Auth::user();
        $user->token()->delete();
        return response()->json(['success' => $user->load('roles')],  200);
    });
    Route::get('restaurants/countryandcategory', 'RestaurantsController@findRestaurantWithCountryAndCategory');
    Route::get('restaurants/postsandcomments', 'RestaurantsController@restaurantWithPostsAndComments');
    Route::get('restaurants', 'RestaurantsController@index');
    Route::post('restaurants/store', 'RestaurantsController@store');
    Route::put('restaurants/update', 'RestaurantsController@update');
    Route::delete('restaurants/destroy', 'RestaurantsController@destroy');
    Route::group(['middleware' => 'role:admin'], function() {
        Route::get('roles', 'RolesController@index');
    });
    Route::post('roles/store', 'RolesController@store');
    Route::put('roles/update', 'RolesController@update');
    Route::delete('roles/destroy', 'RolesController@destroy');

    Route::get('categories', 'CategoriesController@index');
    Route::post('categories/store', 'CategoriesController@store');
    Route::put('categories/update', 'CategoriesController@update');
    Route::delete('categories/destroy', 'CategoriesController@destroy');


    Route::get('comments', 'CommentsController@index');
    Route::get('comments/show', 'CommentsController@show');
    Route::post('comments/store', 'CommentsController@store');
    Route::put('comments/update', 'CommentsController@update');
    Route::delete('comments/destroy', 'CommentsController@destroy');

    Route::get('countries', 'CountriesController@index');
    Route::get('countries/show', 'CountriesController@show');
    Route::post('countries/store', 'CountriesController@store');
    Route::put('countries/update', 'CountriesController@update');
    Route::delete('countries/destroy', 'CountriesController@destroy');


    Route::get('posts', 'PostsController@index');
    Route::post('posts/store', 'PostsController@store');
    Route::put('posts/update', 'PostsController@update');
    Route::delete('posts/destroy', 'PostsController@destroy');

    Route::get('users', 'UsersController@index');
    Route::post('users/store', 'UsersController@store');
    Route::put('users/update', 'UsersController@update');
    Route::delete('users/destroy', 'UsersController@destroy');
    });
});
