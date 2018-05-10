<?php
use App\Comment;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('restaurants/updatepost/{id}', function($id){
  $post = Post::find($id);
  return view('posts.edit')->with('post', $post);
});
Route::get('restaurants/updatecomment/{id}', function($id){
  $comment = Comment::find($id);
  return view('comments.edit')->with('comment', $comment);
});
Route::post('restaurants/createcomment', 'RestaurantsController@createComment');
Route::post('restaurants/createpost', 'RestaurantsController@createPost');
Route::put('restaurants/updatecomment/{id}', 'RestaurantsController@editComment');
Route::put('restaurants/updatepost/{id}', 'RestaurantsController@editPost');

Route::delete('restaurants/deletecomment/{id}', 'RestaurantsController@deleteComment');
Route::delete('restaurants/deletepost/{id}', 'RestaurantsController@deletePost');

Route::get('/', function (){
    return view('welcome');
});
//create
Route::get('/createrestaurant/{restname}/{restphone}/{restaddress1}/{restaddress2}/{suburb}/{state}/{numberofseats}','RestaurantsController@createRestaurant');
//Update
Route::get('/updaterestaurant/{restid}/{restname}/{restphone}/{restaddress1}/{restaddress2}/{suburb}/{state}/{numberofseats}','RestaurantsController@updateRestaurant');
//Delete
Route::get('/deleterestaurant/{restid}', 'RestaurantsController@deleteRestaurant');
//ShowAll
Route::get('/showallrestaurants', 'RestaurantsController@showAllRestaurants');

//Show
Route::get('/showrestaurants', 'RestaurantsController@showRestaurants');

Route::resource('restaurants', 'RestaurantsController');
Route::resource('users', 'UsersController');
Route::resource('countries', 'CountriesController');
Route::resource('roles', 'RolesController');
Route::resource('comments', 'CommentsController');
Route::resource('posts', 'PostsController');
Route::resource('categories', 'CategoriesController');
