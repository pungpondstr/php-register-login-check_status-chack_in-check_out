<?php

include 'navbar2.php';

if ($_SESSION['Status'] != 'Admin'){
  header('location: ./home.php');
}else{

?>

<?php

$query = "select * from member";
$result = $object1 -> prepare($query);
$result -> execute();

?>

<br><br>

<form method = 'POST' action = 'manage.php'>
  <div class="container">
    <table class = 'table table-bordered' align = 'center'>
      <tr align = 'center'>
        <th>id</th>
        <th>Email</th>
        <th>Manage</th>

      </tr>

      <?php
        $con1 = "Staff";
        while ($row = $result -> fetch(PDO::FETCH_ASSOC)){
          if ($row['Status'] == 'Member'){
            $confirm = $row['btn_check_in'];
            $delete = $row['btn_check_out'];
            $view = $row['btn_check_view'];

            // if (isset($_POST[$view])){
            //   $id_select = $row['id'];
            //   $fname1 = $row['first_name'];
            //   echo "<script>swal('Profile', name = $fname1);</script>";
            // }

            if (isset($_POST[$confirm])){
              $query_update = "update member set Status = ? where btn_check_out = ?";
              $result_update = $object1 -> prepare($query_update);
              $result_update -> bindParam('1', $con1);
              $result_update -> bindParam('2', $delete);
              if ($result_update -> execute()){
                //echo "<script>swal('Confirm success', '', 'success');</script>";
                header('location: ./manage.php');
              }
            }

            if (isset($_POST[$delete])){
              $query_delete = "delete from member where btn_check_in = ?";
              $result_delete = $object1 -> prepare($query_delete);
              $result_delete -> bindParam('1', $confirm);
              if ($result_delete -> execute()){
                //echo "<script>swal('Confirm success', '', 'success');</script>";
                header('location: ./manage.php');
              }
            }

      ?>
        <tr align = 'center'>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['Email']; ?></td>
          <td>
            <?php
              echo "
                    <input class = 'btn btn-outline-primary' name = '$confirm' type = 'submit' value = 'Confirm'/>
                    <input class = 'btn btn-outline-danger' name = '$delete' type = 'submit' value = 'Delete'/>";
            ?>
          </td>
        </tr>
      <?php }} ?>

    </table>
  </div>
</form>

<?php } ?>
