<?php

include 'navbar2.php';

if ($_SESSION['Status'] != 'Staff'){
  header('location: ./home.php');
}else{

$query = "select * from member";
$result = $object1 -> prepare($query);
$result -> execute();
$row = $result -> fetch(PDO::FETCH_ASSOC);

$email = $row['Email'];

$query_1 = "select sum(sum) from history where Email = ?";
$result_1 = $object1 -> prepare($query_1);
$result_1 -> bindParam('1', $email);
$result_1 -> execute();
$row1 = $result_1 -> fetch(PDO::FETCH_ASSOC);

?>

<br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">History</div>

                <div class="card-body">
                    <form method="POST" action="history.php">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Coordinates</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox1' type = 'text' value = "<?php echo $row['location']; ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Check In</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox2' type = 'text' value = "<?php echo $row['check_in']; ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Check Out</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox3' type = 'text' value = "<?php echo $row['check_out']; ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Work_day</label>

                            <div class="col-md-6">
                                <input class = 'form-control' name = 'textbox4' type = 'text' value = "<?php echo $row1['sum(sum)'].' Day'; ?>" readonly/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>
