<?php

include 'navbar1.php';

?>

<br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="index.php">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox1' type = 'text' autofocus required placeholder = 'Example@domain.com'/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox2' type = 'password' required placeholder = '********'/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button name = 'button1' type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['button1'])){
  $user = $_POST['textbox1'];
  $pass = $_POST['textbox2'];
  $query = "select * from member where Email = ? and Password = ?";
  $result = $object1 -> prepare($query);
  $result -> bindParam('1', $user);
  $result -> bindParam('2', $pass);
  $result -> execute();
  $row = $result -> fetch(PDO::FETCH_ASSOC);
  if ($result -> rowCount() >= 1){
    $_SESSION['id'] = $row['id'];
    $_SESSION['Email'] = $row['Email'];
    $_SESSION['Password'] = $row['Password'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['Status'] = $row['Status'];
    $_SESSION['date'] = $row['date'];
    $_SESSION['date1'] = $row['date1'];
    if ($_SESSION['Status'] == 'Member'){
      header('location: ./home.php');
    }else if ($_SESSION['Status'] == 'Staff'){
      if ($date1 == $_SESSION['date1']){
        echo "<script>swal('Please Login next Day', '', 'error');</script>";
      }else{
        header('location: ./home.php');
      }
    }else if ($_SESSION['Status'] == 'Admin'){
      header('location: ./home.php');
    }

  }else{
    echo "<script>swal('Email or Password wrong', '', 'error');</script>";
  }
}

?>
