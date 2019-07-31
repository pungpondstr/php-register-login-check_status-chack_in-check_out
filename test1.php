<!DOCTYPE html>
<html>
<body>

  <?php


  $data = array();

  $name1 = "<p id='demo'></p>";

  array_push($data, $name1);

  $a11 = $data[0];
  $id = 1;

  echo $a11;

  include 'config.php';

  $query = "update member set location = ? where id = ?";
  $result = $object1 -> prepare($query);
  $result -> bindParam('1', $a11);
  $result -> bindParam('2', $id);
  $result -> execute();
  //print_r($data);


  ?>

<button onclick="myFunction()">Try it</button>

<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else {
    x.innerHTML;
  }
}

function showPosition(position) {
    var x = document.getElementById("demo").innerHTML=position.coords.latitude + ',' + position.coords.longitude;
    //x.innerHTML=position.coords.latitude + ',' + position.coords.longitude;
    return x.innerHTML;
}

getLocation();

</script>

</body>
</html>
