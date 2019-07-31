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

<form method="POST" action = 'show.php'>
  <br><br>

  <div class="container">
    <table class = 'table table-bordered' align = 'center'>
      <tr align = 'center'>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Manage</th>
      </tr>

      <?php
        while($row = $result -> fetch(PDO::FETCH_ASSOC)){
          $id_check = $row['id'];

          if (isset($_POST[$id_check])){
            $_SESSION['$id_check'] = $id_check;
            header('location: ./view.php');
          }
      ?>
      <tr align = 'center'>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['last_name']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <td>
          <input class = 'btn btn-outline-info' name = "<?php echo $id_check; ?>" type = 'submit' value = 'View'/>
        </td>
      </tr>
      <?php } ?>

    </table>
  </div>

  <?php } ?>

</form>
