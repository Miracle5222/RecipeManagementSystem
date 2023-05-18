<?php
// Start the session
session_start();
?>
<?php include "../includes/header.php" ?>


<?php include "../connections/config.php" ?>
<nav>
    <div class="container">
        <div class="row">

            <div class="nav-container">
                <a class="nav-link" href="../index.php">Online Recipe Guide for Home Cook</a>
                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recipes</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item" href="./recipes.php?recipe=breakfast">Breakfast</a>
                            <a class="dropdown-item" href="./recipes.php?recipe=Dinner">Dinner</a>
                            <a class="dropdown-item" href="./recipes.php?recipe=Lunch">Lunch</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="popularRecipes.php">Popular Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="latestRecipes.php">Latest Recipes</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Ingredients</a>
                        <div class="dropdown-menu border-0 orange">

                            <?php
                            foreach ($_SESSION['mainIngridients'] as $ingredients) : ?>
                                <a class="dropdown-item " href="./ingredients.php?ingredients=<?= $ingredients ?>"><?= $ingredients ?></a>
                            <?php endforeach;
                            ?>

                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Cuisine</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./cuisine.php?cuisine=Filipino">Filipino</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Korean">Korean</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Japanese">Japanese</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">About</a>
                    </li>
                    <?php include "./search.php" ?>
                </ul>
                <div class="right-container">

                    <div>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Settings</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="../pages/profile.php">Profile</a>

                            <?php
                            if (!isset($_SESSION['id'])) { ?>
                                <a class="dropdown-item" href="../pages/login.php">Sign-In</a>
                            <?php } else { ?>
                                <a class="dropdown-item" href="addUserRecipe.php">Add Recipe</a>
                                <a class="dropdown-item" href="myrecipes.php">My Recipe</a>
                                <a class="dropdown-item" href="../control/logout.php">Logout</a>
                            <?php }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <!-- <?php include  "./process/deleteRecipe.php" ?> -->
            <?php
            if (isset($success)) {
                echo $success;
            }
            if (isset($error)) {
                echo $error;
            }
            ?>
        </div>
    </div>
    <div style="margin-top: 50px;">
        <a href="./addUserRecipe.php" class="btn btn-outline-info">Add more Recipe</a>
    </div>
    <div class="row bg-light p-4 mt-4 mb-6">
        <div class="col-md-8 ">
            <div class="card p-4">
                <img class="d-block w-100 image" src="<?= "../../server/uploads/images/$_GET[image]" ?>" alt="recipe">
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

                    move_uploaded_file($file_tmp, "../../server/uploads/images/" . $file_name);

                    $sql = "UPDATE recipe_tbl SET title = '$title',description = '$description',type ='$type',date_created = '$date_created',difficulty_level = '$difficulty_level',cuisine = '$cuisine',video = '$video',image ='$file_name' , mainIngridients = '$main' WHERE recipe_id='$recipe_id'";

                    if ($conn->query($sql) === TRUE) {
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Recipe Updated successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Recipe Updated Failed.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <?php
                    }
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
                                    <input type="text" class="form-control" value="<?= $row['video'] ?>" name="video" placeholder="a2dhymoTHw.." />
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
                $sql = "DELETE FROM ingridient_tbl WHERE ingridient_id = '$_GET[deleteIngredients]'";
                $result = $conn->query($sql);


                if ($conn->query($sql) === TRUE) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Ingredients Deleted!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php

                } else { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Failed to delete Ingredients!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php }
            }
            ?>

            <?php
            if (isset($_POST['submitIngredients'])) {

                $recipe = $_POST['recipe'];
                $Ingredients = $_POST['Ingredients'];

                $ingredientsQuery = "INSERT INTO ingridient_tbl (ingridient_name, recipe_id) VALUES ('$Ingredients', '$recipe')";
                $iquery = mysqli_query($conn, $ingredientsQuery);

                if ($iquery) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Ingredients added successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed to add Ingredients</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php }
            }
            ?>

            <div class="card d-flex justify-content-center align-items-center flex-row">
                <h3 class="text-info p-4 text-center">Ingredients</h3>
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModals">Add Ingredients</button>
                <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabels" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Ingredients</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="recipe" class="form-label">Recipe ID</label>
                                        <?php if (isset($_GET['id'])) { ?>
                                            <input type="text" class="form-control" name="recipe" value="<?= $_GET['id'] ?>" placeholder="Recipe ID">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="recipe" placeholder="Recipe ID">
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="Ingredients" class="form-label">Ingredients</label>
                                        <input type="text" class="form-control" name="Ingredients" placeholder="Ingredients..">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        <!-- <th scope="col">Ingredients</th> -->

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
                                        <a href="editUserIngredients.php?id=<?= $_GET['id'] ?>&ingridient_id=<?= $row['ingridient_id'] ?>&image=<?= $_GET['image'] ?> " class="px-2">
                                            Edit</a>
                                        <a href="userRecipeInfo.php?id=<?= $_GET['id'] ?>&deleteIngredients=<?= $row['ingridient_id'] ?>&image=<?= $_GET['image'] ?>" class="text-danger">
                                            Delete</a>
                                        <!-- <a href="editIngredients.php" class="text-info fw-semibold px-4">Edit</a> <a href="recipeInfo.php?id=<?= $_GET['id'] ?>&deleteIngredients=<?= $row['ingridient_id'] ?>&image=<?= $_GET['image'] ?>" class="text-danger fw-semibold">Delete</a> -->
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

                $sql = "DELETE FROM directions_tbl WHERE directions_id = '$_GET[deleteDirections]'";
                if ($conn->query($sql) === TRUE) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Directions Deleted!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Failed to delete Directions!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
                }
            }
            ?>

            <?php


            if (isset($_POST['submitDirection'])) {
                $recipe = $_POST['recipe'];
                $steps = $_POST['steps'];
                $direction = $_POST['direction'];
                $id = $_GET['id'];
                $image = $_GET['image'];





                $directionQuery = "INSERT INTO directions_tbl (recipe_id,heading,directions) VALUES ('$recipe','$steps','$direction')";
                $iquery = $conn->query($directionQuery);


                if ($iquery) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Direction added successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed to add Direction</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php }
            }

            ?>
            <div class="card d-flex justify-content-center align-items-center flex-row">
                <h3 class="text-info p-4 text-center">Directions</h3>
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add Directions</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Directions</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" action="./userRecipeInfo.php?id=<?= $_GET['id'] ?>&image=<?= $_GET['image'] ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="recipe" class="form-label">Recipe ID</label>
                                        <?php if (isset($_GET['id'])) { ?>
                                            <input type="text" class="form-control" name="recipe" value="<?= $_GET['id'] ?>" placeholder="Recipe ID">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="recipe" placeholder="Recipe ID">
                                        <?php  } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="steps" class="form-label">Step</label>
                                        <input type="text" class="form-control" name="steps" placeholder="Steps">
                                    </div>
                                    <div class="form-group">
                                        <label for="direction" class="form-label">Direction</label>
                                        <input type="text" class="form-control" name="direction" placeholder="Direction..">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary text-white" name="submitDirection" value="Submit">
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

                        <li class="list-group-item fs-4 fw-bold border-0 "><strong>Step:<?= $row['heading'] ?></strong></li>
                        <li class="list-group-item border-0 fs-5"><?= $row['directions'] ?>
                            <br>
                            <a href="./editDirections.php?id=<?= $_GET['id'] ?>&d_Id=<?= $row['directions_id'] ?>&image=<?= $_GET['image'] ?> " class="px-2">
                                Edit</a>
                            <a href="userRecipeInfo.php?id=<?= $_GET['id'] ?>&deleteDirections=<?= $row['directions_id'] ?>&image=<?= $_GET['image'] ?>" class="text-danger">
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

</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<!-- Initialize Datatables -->
<script>
    $(document).ready(function() {
        $('#recipe_table').DataTable();
    });
</script>
</div>
<?php include "../includes/footer.php" ?>