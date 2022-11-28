<?php
session_start();
?>

<?php include "./connections/config.php" ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Recipe Management System</title>
  <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />

  <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png" />

  <link href="./assets/libs/chartist/dist/chartist.min.css" rel="stylesheet" />

  <link href="./dist/css/style.min.css" rel="stylesheet" />
  <link href="main.css" rel="stylesheet" />
</head>

<body>

  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $GLOBALS['invalidUsername'] = "";
    $GLOBALS['invalidPassword'] = "";


    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select * from admin_tbl";
    $results = $conn->query($query);
    if ($results->num_rows > 0) {
      while ($row = $results->fetch_assoc()) {
        if ($username == $row['username'] && $password == $row['password']) {
          $_SESSION['username'] = $row['username'];
          $_SESSION['admin_id'] = $row['admin_id'];
          $_SESSION['email'] = $row['email'];
          header("Location: ./main.php");
        } else {
          if ($username != $row['username']) {
            $GLOBALS['invalidUsername'] = ' <div class="alert alert-danger my-2 alert-dismissible fade show" role="alert">
            <strong>Invalid Username</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
          }
          if ($password != $row['password']) {

            $GLOBALS['invalidPassword'] = '<div class="alert alert-danger my-2 alert-dismissible fade show" role="alert">
            <strong>Invalid Password</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
          }
        }
      }
    }
  }
  ?>
  <div style="
    background-image: url(../server/uploads/images/bg.jpg); width:100vw;
     background-size:cover; height: 100vh;
      background-repeat:no-repeat;background-position:center; position:absolute;">
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4  d-flex justify-content-center align-items-center" style="height:100vh;">
          <div class="py-4 d-flex flex-column justify-content-center align-items-center formstyle">
            <form method="POST" enctype="multipart/form-data">
              <h1 class="text-center text-white">Login</h1>
              <div class="control-group mt-4">
                <label class="form-label text-white">Username</label>
                <input type="text" class="form-control" name="username" placeholder="username">
              </div>
              <?php if (isset($GLOBALS['invalidPassword'])) {
                echo  $GLOBALS['invalidUsername'];
              } ?>
              <div class="control-group mt-4 ">
                <label class="form-label text-white">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password">

              </div>
              <?php if (isset($GLOBALS['invalidPassword'])) {
                echo  $GLOBALS['invalidPassword'];
              } ?>
              <div class="form-group mt-4">
                <input type="submit" class="btn btn-primary" value="Login" name="submit">
                <!-- <button type="submit" class="btn btn-primary" name="submit">Submit</button> -->
              </div>
            </form>
          </div>

        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>



  <footer class="footer text-center">
    Recipe Management System <strong>copy right &copy 2022</strong>
  </footer>


  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./dist/js/app-style-switcher.js"></script>
  <!--Wave Effects -->
  <script src="./dist/js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="./dist/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="./dist/js/custom.js"></script>
  <!--This page JavaScript -->
  <!--chartis chart-->
  <script src="./assets/libs/chartist/dist/chartist.min.js"></script>
  <script src="./assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
  <script src="./dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>