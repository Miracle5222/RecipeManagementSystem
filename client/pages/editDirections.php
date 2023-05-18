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
        <div class="col-md-8">
            <div class="col-md-6">
                <?php
                if (isset($_POST['editDirection'])) {
                    $d_Id = $_GET['d_Id'];
                    $id = $_POST['recipe'];
                    $steps = $_POST['steps'];
                    $directions = $_POST['direction'];

                    $sql = "UPDATE directions_tbl SET heading = '$steps', directions = '$directions', recipe_id = '$id' WHERE directions_id = '$d_Id'";

                    if ($conn->query($sql) === TRUE) {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Directions Updated successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Failed to update Directions.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="card">
                    <h2 class="p-4 text-info text-center">Edit Directions</h2>
                </div>
                <?php
                if (isset($_GET['id'])) {
                    $sql = "SELECT * FROM directions_tbl WHERE recipe_id = '$_GET[id]' AND directions_id = '$_GET[d_Id]'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                ?>
                    <div class="card p-4">
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
                                <label for="steps" class="form-label">Step</label>
                                <?php if (isset($_GET['id'])) { ?>
                                    <input type="text" class="form-control" name="steps" value="<?= $row['heading'] ?>" placeholder="Steps">
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="steps" placeholder="Steps">
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="direction" class="form-label">Direction</label>
                                <?php if (isset($_GET['id'])) { ?>
                                    <textarea class="form-control" name="direction" rows="5" placeholder="Direction.."><?= $row['directions'] ?></textarea>
                                <?php } else { ?>
                                    <textarea class="form-control" rows="5" name="direction" placeholder="Direction.."><?= $row['directions'] ?></textarea>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success text-white" name="editDirection" value="Submit">
                                <a href="userRecipeInfo.php?id=<?= $_GET['id'] ?>&image=<?= $_GET['image'] ?>" class="btn btn-outline-success">Back</a>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>

        </div>




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