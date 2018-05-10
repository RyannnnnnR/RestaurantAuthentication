<!DOCTYPE html>
<html>
<head>
 <title>Add Restaurant</title>
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
<h1>Edit Restaurant Details({{$restaurant->restid}})</h1>
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::model($restaurant, array('route' => array('restaurants.update', $restaurant->id), 'method'=> 'PUT')) }}
 <div class="form-group">
 {{ Form::label('restname', 'Restaurant Name') }}
 {{ Form::text('restname', Input::old('restname'), array('class'=> 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('restphone', 'Restaurant Phone') }}
 {{ Form::text('restphone', Input::old('restphone'), array('class'=> 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('restaddress1', 'Restaurant Address 1') }}
 {{ Form::text('restaddress1', Input::old('restaddress1'),
array('class' => 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('restaddress2', 'Restaurant Address 2') }}
 {{ Form::text('restaddress2', Input::old('restaddress2'), array('class'=> 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('suburb', 'Suburb') }}
 {{ Form::text('suburb', Input::old('subrub'), array('class'=> 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('state', 'State') }}
 {{ Form::text('state', Input::old('state'),array('class' => 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('numberofseats', 'Number of Seats') }}
 {{ Form::text('numberofseats', Input::old('numberofseats'),array('class' => 'form-control')) }}
 </div>
 <div class="form-group">
   {{ Form::Label('country', 'Country') }}
   {{ Form::select('country_id', $countries, null, ['class' => 'form-control']) }}
 </div>
 <div class="form-group">
   {{ Form::Label('category_id', 'Category') }}
   {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
 </div>
 {{ Form::submit('Edit Restaurant!', array('class'=> 'btn btn-primary')) }}
 {{ Form::close() }}
</div>
</body>
</html>
