<?php

include 'navbar1.php';

?>

<br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="register.php">

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">Firstname</label>

                          <div class="col-md-6">
                              <input class = 'form-control' name = 'fname' type = 'text' autofocus required/>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">Lastname</label>

                          <div class="col-md-6">
                              <input class = 'form-control' name = 'lname' type = 'text' required/>
                          </div>
                      </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'email' type = 'email' autofocus required placeholder = 'Example@domain.com'/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'pass1' type = 'password' required placeholder = '********'/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'pass2' type = 'password' required placeholder = '********'/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Tel</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'tel' type = 'number' required/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button name = 'button1' type="submit" class="btn btn-primary">Register</button>
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
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];
  $tel = $_POST['tel'];

  $btn_check_in = md5($email);
  $btn_check_out = md5($btn_check_in);
  $btn_check_view = md5($btn_check_out);

  $query = "insert into member (first_name, last_name, Email, Password, tel, btn_check_in, btn_check_out, btn_check_view) values (?, ?, ?, ?, ?, ?, ?, ?)";
  $result = $object1 -> prepare($query);

  if ($pass1 != $pass2){
    echo "<script>swal('The password does not match', '', 'error');</script>";
    exit();
  }

  $result -> bindParam('1', $fname);
  $result -> bindParam('2', $lname);
  $result -> bindParam('3', $email);
  $result -> bindParam('4', $pass1);
  $result -> bindParam('5', $tel);
  $result -> bindParam('6', $btn_check_in);
  $result -> bindParam('7', $btn_check_out);
  $result -> bindParam('8', $btn_check_view);
  if ($result -> execute()){
    echo "<script>window.location.assign('./index.php');</script>";
  }else{
    echo "<script>swal('Duplicate mail in the database', '', 'error');</script>";
    exit();
  }
}

?>
