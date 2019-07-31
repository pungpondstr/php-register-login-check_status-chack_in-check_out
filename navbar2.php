<?php

include 'config.php';

if ($_SESSION['id'] == ''){
  header('location: ./index.php');
}else{

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/sweetalert.css">

    <title>Check</title>
  </head>
  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Check
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                          <a class="nav-link" href="./home.php">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo $_SESSION['first_name']; ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <?php

                                  if ($_SESSION['Status'] == 'Member'){
                                    echo "<a class = 'dropdown-item' href = './logout.php'>Logout</a>";
                                  }else if ($_SESSION['Status'] == 'Staff'){
                                    echo "<a class = 'dropdown-item' href = './history.php'>History</a>
                                          <a class = 'dropdown-item' href = './logout.php'>Logout</a>";
                                  }else if ($_SESSION['Status'] == 'Admin'){
                                    echo "<a class = 'dropdown-item' href = './show.php'>Show</a>
                                          <a class = 'dropdown-item' href = './manage.php'>Manage</a>
                                          <a class = 'dropdown-item' href = './logout.php'>Logout</a>";
                                  }

                                  ?>

                              </div>
                          </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/sweetalert-dev.js"></script>

  </body>
  <?php } ?>
</html>
