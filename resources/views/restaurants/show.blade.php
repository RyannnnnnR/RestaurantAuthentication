<!DOCTYPE html>
<html>
<head>
 <title>Show Order Detail</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
     <div class="navbar-header">
       <a class="navbar-brand" href="{{URL::to('restaurants') }}">Restaurant Alerts</a>
     </div>
     <ul class="nav navbar-nav">
     <li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
     <li><a href="{{ URL::to('restaurants/create')}}">Add a Restaurant</a></li>
     <li><a href="{{ URL::to('users')}}">All Users</a></li>
     <li><a href="{{ URL::to('users/create')}}">Add a User</a></li>
     <li><a href="{{ URL::to('categories')}}">All Categories</a></li>
     <li><a href="{{ URL::to('categories/create')}}">Add a Category</a></li>
     <li><a href="{{ URL::to('roles')}}">All Roles</a></li>
     <li><a href="{{ URL::to('roles/create')}}">Add a Role</a></li>
     </ul>
    </nav>
<h1>Showing Restaurant: {{ $restaurant->restname }}</h1>
<br/>
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<br/>
 <div class="jumbotron text-center">
  <p>Phone: {{ $restaurant->restphone }}</p>
  <p>Address: {{ $restaurant->restaddress1 }}, {{ $restaurant->restaddress2 }}, {{ $restaurant->suburb }}, {{ $restaurant->state }}</p>
  <p>Number of Seats: {{ $restaurant->numberofseats}}</p>
  <p>Country: {{ $restaurant->country->name}}</p>
  <p>Category: {{ $restaurant->category->name}}</p>
 </div>
 {{ Html::ul($errors->all()) }}
 @foreach($restaurant->posts as $key => $value)
 <div class="panel panel-default">
  <div class="panel-heading">Post
    {{ Form::open(array('url' => 'restaurants/deletepost/' .
   $value->id, 'class'=> 'pull-right'))}}
    {{ Form::hidden('_method', 'DELETE') }}
   {{ Form::submit('Delete this Post',
   array('class' => 'btn btn-sm btn-danger')) }}
    {{ Form::close() }}

    <!-- edit this nerd (uses the edit method found
   at GET /nerds/{id}/edit -->
    <a class="btn btn-sm btn-info pull-right" href="{{
   URL::to('restaurants/updatepost/'.$value->id) }}">Edit Post</a>
  </div>
  <div class="panel-body">
    <h5 class="panel-title">{{$value->user->name}}[{{$value->user->country->name}}] Wrote: <span class="pull-right">{{$value->created_at}}</span><br</h5>
    <div class="post-content">
      {{$value->content}}
    </div>
    <br />
    <br />
    <ul class="list-group">
    @foreach($value->comments as $comment)
      <li class="list-group-item">{{$comment->user->name}}[{{$comment->user->country->name}}] Wrote: <span class="pull-right">{{$comment->created_at}}</span><br />{{$comment->content}}
        {{ Form::open(array('url' => 'restaurants/deletecomment/' .
       $comment->id, 'class'=> 'pull-right'))}}
        {{ Form::hidden('_method', 'DELETE') }}
       {{ Form::submit('Delete this Comment',
       array('class' => 'btn btn-sm btn-danger')) }}
        {{ Form::close() }}

        <!-- edit this nerd (uses the edit method found
       at GET /nerds/{id}/edit -->
        <a class="btn btn-sm btn-info pull-right" href="{{
       URL::to('restaurants/updatecomment/'.$comment->id) }}">Edit Comment</a>
      </li>
    @endforeach
  </ul>
  {{ Form::open(array('url' =>
'restaurants/createcomment')) }}
 <div class="form-group">
 {{ Form::label('content', 'Comment') }}
 {{ Form::text('content', Input::old('content'),
array('class' => 'form-control')) }}
 </div>
 <div class="form-group">
   {{ Form::Label('user_id', 'Users') }}
   {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
 </div>
 {{ Form::hidden('post_id', $value->id,
array('id' => 'post_id')) }}
 {{ Form::submit('Post Comment',
array('class' => 'btn btn-primary')) }}
 {{ Form::close() }}
  </div>
</div>
@endforeach
{{ Form::open(array('url' =>
'restaurants/createpost')) }}
<div class="form-group">
{{ Form::label('post', 'Post') }}
{{ Form::text('content', Input::old('content'),
array('class' => 'form-control')) }}
</div>
<div class="form-group">
 {{ Form::Label('post_user_id', 'Users') }}
 {{ Form::select('post_user_id', $users, null, ['class' => 'form-control']) }}
</div>
{{ Form::hidden('restaurant_id', $restaurant->id, array('id' => 'restaurant_id')) }}
{{ Form::submit('Post', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
</div>
</body>
</html>
