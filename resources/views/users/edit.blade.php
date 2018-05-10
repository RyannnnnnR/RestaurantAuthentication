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
<h1>Add User</h1>
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::model($user, array('route' => array('users.update', $user->id), 'method'=> 'PUT')) }}
 <div class="form-group">
 {{ Form::label('name', ' Name') }}
 {{ Form::text('name', Input::old('name'), array('class'=> 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('email', 'Email') }}
 {{ Form::text('email', Input::old('email'), array('class'=> 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('password', 'Password') }}
 {{ Form::password('password', array('class'=> 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('password_confirmation', 'Password Confirmation') }}
 {{ Form::password('password_confirmation', array('class'=> 'form-control')) }}
 </div>
 <div class="form-group">
   {{ Form::Label('country', 'Country') }}
   {{ Form::select('country_id', $countries, null, ['class' => 'form-control']) }}
 </div>
 <p>Roles</p>
 @foreach($roles as $role)
 <div class="checkbox">
   {{ Form::checkbox('roles[]', $role->id, false) }}
   {{ Form::Label('role_$role', $role->name) }}
 </div>
 @endforeach
 {{ Form::submit('Add User!', array('class'=> 'btn btn-primary')) }}
 {{ Form::close() }}
</div>
</body>
</html>
