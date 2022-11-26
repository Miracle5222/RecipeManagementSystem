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

    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <!-- <script src="  https://code.jquery.com/jquery-3.5.1.js"></script> -->


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
                                            Admin <i class="fa fa-angle-down"></i>
                                        </h5>
                                        <span class="op-5 user-email">Admin@gmail.com</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account
                                            Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="recipes.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Recipes</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.html" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a>
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
                        <h4 class="page-title">Recipe Information</h4>
                    </div>
                </div>
            </div>




            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-5">

                    </div>
                </div>
                <div class="container ">
                    <div class="row bg-light p-4">

                        <div class="col-md-8 ">
                            <div class="card p-4">
                                <img class="d-block w-100 image" src="<?= "./../server/uploads/images/$_GET[image]" ?>" alt="recipe">
                            </div>
                            <?php

                            if (isset($_POST['submit'])) {
                                $recipe_id = $_POST['recipe_id'];
                                $title = $_POST['title'];
                                $description = $_POST['description'];
                                $description =  str_replace("'", "",  "$description");
                                $type = $_POST['type'];
                                $date_created = $_POST['date_created'];
                                $difficulty_level = $_POST['difficulty_level'];
                                $cuisine = $_POST['cuisine'];
                                $video = $_POST['video'];
                                $main = $_POST['images'];
                                // print_r($_FILES['image']);

                                if (isset($_FILES['image']['name'])) {

                                    if ($_FILES['image']['name'] == "") {
                                        $file_name = $_GET['image'];
                                    } else {
                                        $file_name = $_FILES['image']['name'];
                                    }

                                    $file_tmp = $_FILES['image']['tmp_name'];

                                    move_uploaded_file($file_tmp, "./uploads/images/" . $file_name);

                                    $sql = "UPDATE recipe_tbl SET title = '$title',description = '$description',type ='$type',date_created = '$date_created',difficulty_level = '$difficulty_level',cuisine = '$cuisine',video = '$video',image ='$file_name' , mainIngridients = '$main' WHERE recipe_id='$recipe_id'";

                                    if ($conn->query($sql) === TRUE) { ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Recipe Updated successfully.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Recipe Updated Failed.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                            <?php }
                                }
                            }
                            ?>

                            <div class="card p-4">
                                <?php
                                if (isset($_GET['id'])) {

                                    $sql = "SELECT * FROM recipe_tbl where recipe_id='$_GET[id]'";
                                    $result = $conn->query($sql);

                                    $row = $result->fetch_assoc();

                                ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Recipe ID</label>
                                                    <input type="text" class="form-control" value="<?= $row['recipe_id'] ?>" required name="recipe_id" placeholder="422" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="<?= $row['title'] ?>" required name="title" placeholder="Adobo..." />
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="form-label">Description</label>
                                                    <textarea type="text" class="form-control" name="description" rows="5" required placeholder="Sample Description"><?= $row['description'] ?>" </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Type</label>
                                                    <select class="form-select" aria-label="Default select example" required name="type">

                                                        <option value="Breakfast">Breakfast</option>
                                                        <option value="Dinner">Dinner</option>
                                                        <option value="Lunch">Lunch</option>
                                                        <option value="Desserts">Desserts</option>
                                                        <option value="Appetizer & Snack">Appetizer & Snack</option>


                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Date Added</label>
                                                    <input type="date" class="form-control" required value="<?= $row['date_created'] ?>" name="date_created" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Difficulty Level</label>
                                                    <input type="text" class="form-control" required value="<?= $row['difficulty_level'] ?>" name="difficulty_level" placeholder="Easy..." />
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Cuisine</label>

                                                    <select class="form-select" aria-label="Default select example" required name="cuisine">
                                                        <option selected><?= $row['cuisine'] ?></option>
                                                        <option value="Filipino">Filipino</option>
                                                        <option value="Chinese">Chinese</option>
                                                        <option value="Mixican">Mixican</option>
                                                        <option value="German">German</option>
                                                        <option value="Japanese">Japanese</option>
                                                        <option value="Italian">Italian</option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Video ID</label>
                                                    <input type="text" class="form-control" required value="<?= $row['video'] ?>" name="video" placeholder="a2dhymoTHw.." />
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Thumbnail Image</label>
                                                    <input type="file" class="form-control" name="image" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Main Ingridients</label>
                                                    <?php if (!isset($row['mainIngridients'])) { ?>
                                                        <input type="text" class="form-control" name="images" required />
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="images" required value="<?= $row['mainIngridients'] ?>" />
                                                    <?php    } ?>

                                                </div>
                                                <div class="form-group text-center">

                                                    <input type="submit" class="btn btn-success text-white " value="Update" name="submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php  }
                                ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php
                            if (isset($_GET['deleteIngredients'])) {

                                $sql = "delete from ingridient_tbl where  ingridient_id = '$_GET[deleteIngredients]'";
                                if ($conn->query($sql) === TRUE) { ?>

                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Ingredients Deleted!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Failed to delete Ingredients!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <?php

                            if (isset($_POST['submitIngredients'])) {

                                $recipe = $_POST['recipe'];
                                $Ingredients = $_POST['Ingredients'];


                                $ingredientsQuery = "insert into ingridient_tbl (ingridient_name,recipe_id) values ('$Ingredients','$recipe')";
                                $iquery = mysqli_query($conn, $ingredientsQuery);

                                if ($iquery) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> Ingredients added successfully.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                <?php

                                } else { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong> Failed to add Ingredients</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php }
                            }
                            ?>
                            <div class="card  d-flex justify-content-center align-items-center flex-row">
                                <h3 class="text-info p-4 text-center">Ingredients</h3>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModals">Add Ingredients</button>
                                <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabels" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Ingredients</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">

                                                        <label for="recipe" class="form-label">Recipe ID</label>
                                                        <?php if (isset($_GET['id'])) { ?>
                                                            <input type="text" class="form-control" name="recipe" value="<?= $_GET['id'] ?>" placeholder="Recipe ID">
                                                        <?php } else { ?>

                                                            <input type="text" class="form-control" name="recipe" placeholder="Recipe ID">
                                                        <?php  } ?>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Ingredients" class="form-label">Ingredients</label>
                                                        <input type="text" class="form-control" name="Ingredients" placeholder="Ingredients..">
                                                    </div>





                                            </div>
                                            <div class="modal-footer">

                                                <div class="mb-3">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success text-white" name="submitIngredients" value="Submit">
                                                </div>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">ID</th> -->
                                        <th scope="col">Ingredients</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT * FROM ingridient_tbl where  recipe_id = '$_GET[id]' ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {

                                    ?>
                                            <tr>

                                                <!-- <td><?= $row['ingridient_id'] ?></td> -->
                                                <td><?= $row['ingridient_name'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="#" class="text-info fw-semibold px-4">Edit</a> <a href="recipeInfo.php?id=<?= $_GET['id'] ?>&deleteIngredients=<?= $row['ingridient_id'] ?>&image=<?= $_GET['image'] ?>" class="text-danger fw-semibold">Delete</a>
                                                    </div>
                                                </td>



                                            </tr>
                                        <?php

                                        }
                                    } else { ?>
                                        <tr>

                                            <td class="w-100 text-center " colspan="2">No Ingredients Available</td>

                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_GET['deleteDirections'])) {

                                $sql = "delete from directions_tbl where  directions_id = '$_GET[deleteDirections]'";
                                if ($conn->query($sql) === TRUE) { ?>

                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Directions Deleted!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Failed to delete Directions!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="card d-flex justify-content-center align-items-center flex-row ">
                                <h3 class="text-info p-4 text-center">Directions</h3>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Directions</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Directions</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-material" action="./process/addDirections.php?id=<?= $_GET['id'] ?>&image=<?= $_GET['image'] ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">

                                                        <label for="recipe" class="form-label">Recipe ID</label>
                                                        <?php if (isset($_GET['id'])) { ?>
                                                            <input type="text" class="form-control" name="recipe" value="<?= $_GET['id'] ?>" placeholder="Recipe ID">
                                                        <?php } else { ?>

                                                            <input type="text" class="form-control" name="recipe" placeholder="Recipe ID">
                                                        <?php  } ?>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="steps" class="form-label">Step</label>
                                                        <input type="text" class="form-control" name="steps" placeholder="steps">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="direction" class="form-label">Direction</label>
                                                        <input type="text" class="form-control" name="direction" placeholder="direction..">
                                                    </div>




                                            </div>
                                            <div class="modal-footer">

                                                <div class="mb-3">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary text-white" name="submit" value="Submit">
                                                </div>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ol class="list-group list-group-numbered">


                                <?php

                                $sql = "SELECT * FROM directions_tbl where  recipe_id = '$_GET[id]' ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {

                                ?>

                                        <li class="list-group-item fs-4 fw-bold border-0 ">Step:<?= $row['heading'] ?></li>
                                        <li class="list-group-item border-0 fs-5"><?= $row['directions'] ?>
                                            <br>
                                            <a href="editDirections.php?id=<?= $_GET['id'] ?>&d_Id=<?= $row['directions_id'] ?>&image=<?= $_GET['image'] ?> " class="px-2">
                                                Edit</a>
                                            <a href="recipeInfo.php?id=<?= $_GET['id'] ?>&deleteDirections=<?= $row['directions_id'] ?>&image=<?= $_GET['image'] ?>" class="text-danger">
                                                Delete</a>
                                        </li>

                                    <?php

                                    }
                                } else { ?>
                                    <li class="list-group-item border-0 text-center fs-4">No Directions Available</li>
                                <?php  }
                                $conn->close(); ?>
                            </ol>

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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>


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