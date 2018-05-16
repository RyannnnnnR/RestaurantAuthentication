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
      //  return response()->json(Restaurant::with(['country', 'category'])->find(18), 200);
      return Restaurant::all();
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
    public function findRestaurantWithCountryAndCategory(Request $request)
    {
      return response()->json(Restaurant::where([['country_id','=',$request['country_id']],['category_id','=',$request['country_id']]]), 200);
    }
    public function restaurantWithPostsAndComments(Request $request)
    {
      return response()->json(Restaurant::with(['country', 'category'])->find($request['id']), 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantStoreRequest $request)
    {
      $restaurant = Restaurant::create($request->All());
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
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantStoreRequest $request){
      $restaurant = Restauurant::find($request['id']);
      $restaurant->update($request->all());
      return response()->json($restaurant, 201);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      Restaurant::find($request['id'])->delete();
      return response()->json(null, 204);
    }
}
