<?php
session_start();
?>
<?php

if (!isset($_SESSION['admin_id'])) {
    header("index.php");
}
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

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="./assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="./assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="./assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>

                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <ul class="navbar-nav float-start me-auto">

                    </ul>

                    <ul class="navbar-nav float-end">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>

                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">
                                    <img src="./assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" />
                                </div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium">
                                            <?= $_SESSION['username'] ?> <i class="fa fa-angle-down"></i>
                                        </h5>
                                        <span class="op-5 user-email"><?= $_SESSION['email'] ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="profile.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>


                                        <a class="dropdown-item" href="../server/process/logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="p-15 m-t-10">
                            <a href="addRecipes.php" class="btn d-block w-100 create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i>
                                <span class="hide-menu m-l-5">Add New Recipes</span>
                            </a>
                        </li>
                        <!-- User Profile-->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="main.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="recipes.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Recipes</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <!-- <h4 class="page-title">Add Recipe</h4> -->
                    </div>
                </div>
            </div>




            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <?php

                        if (isset($_POST['submit'])) {

                            $recipe = $_POST['recipe'];
                            $description = "$_POST[description]";
                            $description =  str_replace("'", "",  "$description");
                            $type = $_POST['type'];
                            $date = $_POST['date'];
                            $level = $_POST['level'];
                            $cuisine = $_POST['cuisine'];
                            $video = $_POST['video'];
                            $mainIngridients = $_POST['mainIngridients'];



                            if (isset($_FILES['image']['name'])) {

                                $file_name = $_FILES['image']['name'];


                                $file_tmp = $_FILES['image']['tmp_name'];
                                // $filePath =  "./uploads/images/$file_name";

                                move_uploaded_file($file_tmp, "./uploads/images/" . $file_name);

                                $addquerry = "insert into recipe_tbl(title,description,type,date_created,difficulty_level,cuisine,video,image,mainIngridients) values ('$recipe','$description','$type','$date','$level ','$cuisine','$video','$file_name','$mainIngridients')";
                                $iquery = mysqli_query($conn, $addquerry);

                                if ($iquery) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> Recipe added successfully.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                <?php

                                } else { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong> Add Recipe Failed!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                        <?php }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-5">
                        <div class="card ">
                            <h2 class="p-4 text-info text-center">Add Recipes</h2>
                        </div>
                        <div class="card p-4">
                            <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="recipe" class="form-label">Recipe</label>
                                    <input type="text" class="form-control" required name="recipe" placeholder="Chicken curry..">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" required name="description" placeholder="Description..">
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>

                                    <select class="form-select" aria-label="Default select example" required name="type">
                                        <option selected>Select Type</option>
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Dinner">Dinner</option>
                                        <option value="Lunch">Lunch</option>



                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" required name="date">
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Difficulty Level</label>
                                    <select class="form-select" aria-label="Default select example" required name="level">
                                        <option selected>Select Level</option>
                                        <option value="easy">Easy</option>
                                        <option value="medium">Medium</option>
                                        <option value="hard">Hard</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="cuisine" class="form-label">Cuisine</label>

                                    <select class="form-select" aria-label="Default select example" required name="cuisine">
                                        <option selected>Select Cuisine</option>
                                        <option value="Filipino">Filipino</option>
                                        <option value="Korean">Korean</option>
                                        <option value="Japanese">Japanese</option>

                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="mainIngridients" class="form-label">Main Ingridients</label>

                                    <select class="form-select" aria-label="Default select example" required name="mainIngridients">
                                        <option selected>Select Main Ingredients</option>
                                        <option value="SeaFood">Sea Food</option>
                                        <option value="Vegetables">Vegetables</option>
                                        <option value="Fruits">Fruits</option>
                                        <option value="Beef">Beef</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="video" class="form-label">Video Tutorial</label>
                                    <input type="text" class="form-control" required name="video" placeholder="SvV49SD99DY..">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" required name="image">
                                </div>

                                <div class="mb-3">

                                    <input type="submit" class="btn btn-success text-white" name="submit" value="Submit">
                                </div>


                            </form>
                        </div>
                    </div>


                </div>

                <div class="row"></div>

                <div class="row"></div>

            </div>

            <footer class="footer text-center">
                Recipe Management System <strong>copy right &copy 2022</strong>
            </footer>

        </div>

    </div>

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