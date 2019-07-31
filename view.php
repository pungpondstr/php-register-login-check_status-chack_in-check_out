<?php

include 'navbar2.php';

if ($_SESSION['Status'] != 'Admin'){
  header('location: ./home.php');
}else{

$id_1 = $_SESSION['$id_check'];

$query_select1 = "select * from member where id = ?";
$result_select1 = $object1 -> prepare($query_select1);
$result_select1 -> bindParam('1', $id_1);
$result_select1 -> execute();
$row = $result_select1 -> fetch(PDO::FETCH_ASSOC);

$query_select2 = "select * from member where id = ?";
$result_select2 = $object1 -> prepare($query_select2);
$result_select2 -> bindParam('1', $id_1);
$result_select2 -> execute();
$row1 = $result_select2 -> fetch(PDO::FETCH_ASSOC);
$email_1234 = $row1['Email'];

$query_history = "select sum(sum) from history where Email = ?";
$result_history = $object1 -> prepare($query_history);
$result_history -> bindParam('1', $email_1234);
$result_history -> execute();
$row_history = $result_history -> fetch(PDO::FETCH_ASSOC);

?>

<form method = 'POST' action = 'view.php'>
  <br><br>
  <div class="container">
    <table class = 'table table-bordered' align = 'center'>
      <tr align = 'center'>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Location</th>
        <th>Work_day</th>
        <th>Status</th>
      </tr>

      <tr align = 'center'>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['last_name']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <td><?php echo $row['tel']; ?></td>
        <td><?php echo $row['check_in']; ?></td>
        <td><?php echo $row['check_out']; ?></td>
        <td><?php echo $row['location']; ?></td>
        <td><?php echo $row_history['sum(sum)']; ?></td>
        <td><?php echo $row['Status']; ?></td>
      </tr>
    </table>
  </div>
</form>
<?php } ?>
