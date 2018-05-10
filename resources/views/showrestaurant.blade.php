
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Restaurants</title>
</head>

<body>
  <table border="1">
    <tr>
      <th>Restaurant</th>
      <th>Location</th>
      <th>Cuisine Type</th>
    </tr>

    @foreach ($restaurants as $restaurant)
    <tr>
      <td>{{$restaurant["name"]}}</td>
      <td>{{$restaurant["location"]}}</td>
      <td>{{$restaurant["cuisine"]}}</td>
    </tr>
    @endforeach
  </table>
</body>

</html>
