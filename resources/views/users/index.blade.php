<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Existing Restaurants</title>
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
<h1>All Users</h1>
    <br/>
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message')
    }}</div>
    @endif
    <br/>
    <table class="table table-striped">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role(s)</th>
        <th>Actions</th>
      </tr>
      @foreach($users as $key => $value)
 <tr>
 <td>{{ $value->name }}</td>
 <td>{{ $value->email }}</td>
 <td>
   @foreach($value->roles as $role)
    {{ $loop->first ? '' : ',' }}
    {{$role->name}}
   @endforeach
</td>
 <!-- we will also add show, edit, and delete
buttons -->
 <td>
 <!-- delete the nerd (uses the destroy method
DESTROY /nerds/{id} -->
 <!-- we will add this later since its a little
more complicated than the other two buttons -->
 {{ Form::open(array('url' => 'users/' .
$value->id, 'class'=> 'pull-right'))}}
 {{ Form::hidden('_method', 'DELETE') }}
{{ Form::submit('Delete User',
array('class' => 'btn btn-sm btn-danger')) }}
 {{ Form::close() }}
 <!-- show the nerd (uses the show method found
at GET /nerds/{id} -->
 <a class="btn btn-sm btn-success" href="{{
URL::to('users/' . $value->id) }}">Show User</a>
 <!-- edit this nerd (uses the edit method found
at GET /nerds/{id}/edit -->
 <a class="btn btn-sm btn-info" href="{{
URL::to('users/' . $value->id . '/edit') }}">Edit User</a>
<br/>
 </td>
 </tr>
 @endforeach
    </table>
    <br/>
  </div>
</body>
    </html>
