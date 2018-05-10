<!DOCTYPE html>
<html>
<head>
 <title>Add Restaurant</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<<nav class="navbar navbar-inverse">
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
<h1>Edit Comment</h1>
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::model($post, ['action' => ['RestaurantsController@editPost', $post->id], 'method' => 'PUT']) }}
 <div class="form-group">
 {{ Form::label('content', 'Comment') }}
 {{ Form::text('content', Input::old('content'), array('class'=> 'form-control')) }}
 </div>
 {{ Form::submit('Edit Post!', array('class'=> 'btn btn-primary')) }}
 {{ Form::close() }}
</div>
</body>
</html>
