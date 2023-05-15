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


        <table id="recipe_table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Recipe ID</th>
                    <th>Recipe Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>date_created</th>
                    <th>Difficulty</th>
                    <th>Request Status</th>
                    <!-- <th>Video ID</th> -->
                    <th>User ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM userrecipe_tbl INNER JOIN recipe_tbl ON recipe_tbl.`recipe_id` = userrecipe_tbl.`recipe_id` INNER JOIN user_tbl ON user_tbl.`user_id` = userrecipe_tbl.`user_id` where userrecipe_tbl.user_id = '    $_SESSION[id]'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                ?>
                        <tr>
                            <td> <a href="recipeInfo.php?id=<?= $row['recipe_id'] ?>&image=<?= $row['image'] ?>" class=" btn btn-dark text-white">View Recipe</a></td>
                            <td><?= $row['title'] ?></td>
                            <td><span class="d-block text-truncate" style="max-width: 150px;">
                                    <?= $row['description'] ?>
                                </span></td>
                            <td><?= $row['type'] ?></td>
                            <td><?= $row['date_created'] ?></td>
                            <td><?= $row['difficulty_level'] ?></td>
                            <td><?= $row['recipeStatus'] ?></td>
                            <!-- <td><?= $row['video'] ?></td> -->
                            <td><?= $row['user_id'] ?></td>

                            <td>
                                <div class="d-flex justify-content-between align-items-center flex-row ">
                                    <a href="editRecipes.php?id=<?= $row['recipe_id'] ?>&image=<?= $row['image'] ?>" class="mx-2 btn btn-info">Edit</a>
                                    <a onclick="confirm('are you sure you want to delete this recipe?')" href="./deleteUserRecipe.php?recipe_id=<?= $row['recipe_id'] ?>" class="mx-2   btn btn-danger text-white">Delete</a>
                                    <!-- <a href="./addIngridients.php?recipeId=<?= $row['recipe_id'] ?>" class=" btn btn-dark text-white">Ingridients</a> -->
                                </div>
                            </td>
                        </tr>
                <?php

                    }
                } else {
                }
                $conn->close(); ?>

            </tbody>

        </table>

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