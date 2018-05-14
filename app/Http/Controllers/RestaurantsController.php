<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Country;
use App\Category;
use App\Comment;
use App\Post;
use App\User;
use App\Http\Requests\RestaurantStoreRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(Restaurant::with(['country', 'category'])->find(18), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //Not applicable
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantStoreRequest $request)
    {
      $restaurant = Restaurant::create($request->all());
      return response()->json($restaurant, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $restaurant = Restaurant::find($id);
      $users = User::pluck('name', 'id');
      return View::make('restaurants.show')->with('restaurant', $restaurant)->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $restaurant = Restaurant::find($id);
      $countries = Country::pluck('name', 'id');
      $categories = Category::pluck('name', 'id');
      return View::make('restaurants.edit')->with('restaurant', $restaurant)->with('countries', $countries)->with('categories', $categories);;
    }
    public function createComment(CommentStoreRequest $request){
      $comment = new Comment([
        'content' => Input::get('content'),
        'user_id' => Input::get('user_id'),
        'post_id' => Input::get('post_id'),
      ]);
        $post = Post::find(Input::get('post_id'));
        $post->comments()->save($comment);
        Session::flash('message', 'Sucessfully saved comment');
        return Redirect::to('restaurants/' .$post->restaurant_id);
    }
    //create routes and views
    public function editComment(CommentStoreRequest $request,$id){
      $comment = Comment::find($id);
      $comment->content = Input::get('content');
      $comment->save();
      Session::flash('message', 'Successfully updated comment!');
      return Redirect::to('restaurants/'. Post::find($comment->post_id)->restaurant_id);
    }
    public function deleteComment($id){
      $comment = Comment::find($id);
      $post =  Post::find($comment->post_id);
      $comment->delete();
      Session::flash('message', 'Successfully deleted comment!');
      return Redirect::to('restaurants/'.$post->restaurant_id);
    }
    public function createPost(PostStoreRequest $request){
      $post = new Post([
        'content' => Input::get('content'),
        'user_id' => Input::get('post_user_id'),
        'restaurant_id' => Input::get('restaurant_id'),
      ]);
        $restaurant = Restaurant::find(Input::get('restaurant_id'));
        $restaurant->posts()->save($post);
        Session::flash('message', 'Sucessfully saved post');
        return Redirect::to('restaurants/' .$restaurant->id);
    }
    public function editPost(PostStoreRequest $request,$id){
      $post = Post::find($id);
      $post->content = Input::get('content');
      $post->save();
      Session::flash('message', 'Successfully updated post!');
      return Redirect::to('restaurants/'. $post->restaurant_id);
    }
    public function deletePost($id){
      $post = Post::find($id);
      $id = $post->restaurant_id;
      $post->delete();
      Session::flash('message', 'Successfully deleted post!');
      return Redirect::to('restaurants/'. $id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantStoreRequest $request, $id){
            $restaurant = Restaurant::find($id);
            $restaurant->restname = Input::get('restname');
            $restaurant->restphone = Input::get('restphone');
            $restaurant->restaddress1 = Input::get('restaddress1');
            $restaurant->restaddress2 = Input::get('restaddress2');
            $restaurant->suburb = Input::get('suburb');
            $restaurant->state = Input::get('state');
            $restaurant->numberofseats = Input::get('numberofseats');
            $restaurant->country_id = Input::get('country_id');
            $restaurant->category_id = Input::get('category_id');
            $restaurant->save();
            // redirect
            Session::flash('message', 'Successfully updated restaurant!');
            return Redirect::to('restaurants');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($restid)
    {
      $restaurant = Restaurant::find($restid);
      $restaurant->delete();
      Session::flash('message', 'Successfully deleted restaurant');
      return Redirect::to('restaurants');
    }
}
