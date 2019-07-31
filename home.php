<?php

include 'navbar2.php';

$id_1234 = $_SESSION['id'];
$query_select = "select * from member where id = ?";
$result_select = $object1 -> prepare($query_select);
$result_select -> bindParam('1', $id_1234);
$result_select -> execute();
$row_select = $result_select -> fetch(PDO::FETCH_ASSOC);

?>

<br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    <form method="POST" action="home.php">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox1' type = 'text' value = "<?php echo $_SESSION['Email']; ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Firstname</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox2' type = 'text' value = "<?php echo $_SESSION['first_name']; ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Lastname</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox2' type = 'text' value = "<?php echo $_SESSION['last_name']; ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox2' type = 'text' value = "<?php echo $_SESSION['Status']; ?>" readonly/>
                            </div>
                        </div>

                        <!--<div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                              <span id = 'demo'></span>
                            </div>
                        </div>-->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                              <?php

                              if ($_SESSION['Status'] == 'Member'){

                              }else if ($_SESSION['Status'] == 'Staff'){
                                echo "<p id = 'demo'></p>
                                      <button onclick = 'clickmore()' name = 'button1' id ='button1' type = 'submit' class = 'btn btn-outline-primary'>Check In</button>
                                      <button name = 'button2' type = 'submit' class = 'btn btn-outline-warning'>Check Out</button>";
                              }else if ($_SESSION['Status'] == 'Admin'){
                                //echo 'welcome';
                              }

                              ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script language="javascript">
  //var x = document.getElementById("demo");

  var x = document.getElementById("demo");

  function getLocation() {
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

  function clickmore(){
    getLocation();
  }

</script>

<?php



// function get_geo(){
//   $id = "<script>getLocation();</script>";
//   return $id;
// }


//echo get_geo();

if (isset($_POST['button1'])){
  $id = $_SESSION['id'];
  //$location = get_geo();
  $query = "update member set check_in = ?, date = ? where id = ?";
  $result = $object1 -> prepare($query);
  $result -> bindParam('1', $date);
  $result -> bindParam('2', $date1);
  $result -> bindParam('3', $id);

  if ($date1 == $row_select['date']){
    echo "<script>swal('Check In Repeatedly', '', 'error');</script>";
    exit();
  }else{
    if ($result -> execute()){
      echo "<script>swal('Check In Success', '$date', 'success');</script>";
    }
  }
}

if (isset($_POST['button2'])){
  $id = $_SESSION['id'];
  $query = "update member set check_out = ?, date1 = ? where id = ?";
  $result = $object1 -> prepare($query);
  $result -> bindParam('1', $date);
  $result -> bindParam('2', $date1);
  $result -> bindParam('3', $id);

  if ($date1 == $row_select['date1']){
    echo "<script>swal('Check In Repeatedly', '', 'error');</script>";
  }else{
    if ($result -> execute()){
      $email = $_SESSION['Email'];
      $query_update1 = "insert into history (Email) values (?)";
      $result_update1 = $object1 -> prepare($query_update1);
      $result_update1 -> bindParam('1', $email);
      $result_update1 -> execute();
      echo "<script>window.location.assign('./logout.php');</script>";
      //echo "<script>swal('Check Out Success', '$date', 'success');</script>";
    }
  }

}

?>
