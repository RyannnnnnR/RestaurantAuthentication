<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('restaurants', 'RestaurantsController');
Route::resource('countries', 'CountriesController');
Route::resource('roles', 'RolesController');
Route::resource('categories', 'CategoriesController');
Route::resource('posts', 'PostsController');
Route::resource('comments', 'CommentsController');
Route::resource('users', 'UsersController');
