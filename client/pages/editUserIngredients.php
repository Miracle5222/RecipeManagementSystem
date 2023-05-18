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

        <div class="col-md-6">
            <?php
            if (isset($_POST['editIngredients'])) {
                $ingridient_id = $_GET['ingridient_id'];
                $id = $_POST['recipe'];
                $Ingredients = $_POST['Ingredients'];

                $sql = "UPDATE ingridient_tbl SET ingridient_name = '$Ingredients', recipe_id = '$id' WHERE ingridient_id ='$ingridient_id'";

                if ($conn->query($sql) === TRUE) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Ingredients updated successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed to update Ingredients.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php }
            }
            ?>

            <div class="card">
                <h2 class="p-4 text-info text-center">Edit Ingredients</h2>
            </div>

            <?php
            if (isset($_GET['id'])) {
                $sql = "SELECT * FROM ingridient_tbl WHERE recipe_id='$_GET[id]' AND ingridient_id = '$_GET[ingridient_id]'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            ?>
                <div class="card p-4">
                    <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipe" class="form-label">Recipe ID</label>
                            <?php if (isset($_GET['id'])) { ?>
                                <input type="text" class="form-control" name="recipe" value="<?= $_GET['id'] ?>" placeholder="Recipe ID">
                            <?php } else { ?>
                                <input type="text" class="form-control" name="recipe" placeholder="Recipe ID">
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="Ingredients" class="form-label">Ingredients</label>
                            <input type="text" class="form-control" name="Ingredients" value="<?= $row['ingridient_name'] ?>" placeholder="Ingredients..">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success text-white" name="editIngredients" value="Submit">
                            <a href="userRecipeInfo.php?id=<?= $_GET['id'] ?>&image=<?= $_GET['image'] ?>" class="btn btn-outline-success">Back</a>
                        </div>
                    </form>
                </div>
            <?php } ?>

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

                <?php

                } else { ?>
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