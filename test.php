<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="POST" action = 'test1.php'>
      <input type="text" placeholder="Enter Data" name="data">
      <input type="submit" value="Submit">
      <p id = 'demo' name = 'data1'></p>
    </form>
  </body>
</html>

<script language="javascript">
  var x = document.getElementById("demo");

  function getLocation(value) {
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(showPosition);
    } else {
      x.innerHTML;
    }
  }

  function showPosition(position) {
      var str1 = x.innerHTML=position.coords.latitude + ',' + position.coords.longitude;
      //str1;
  }

  getLocation();

</script>

<?php
  $result = $_POST['data'];
  $result1 = $_POST['data1'];
  echo $result;
?>
