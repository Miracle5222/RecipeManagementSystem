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
                <a class="nav-link" href="../index.php">Recipe Management System</a>
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
<?php if (isset($_SESSION['id'])) { ?>
    <div class="container">

        <div class="section" id="latest">


            <div class="row">
                <div class="col-lg-4 col-xlg-4 col-md-4">

                    <?php
                    if (isset($_POST['submit'])) {
                        $status;
                        $message;
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $update = "update user_tbl set username = '$username', password = '$password', email = '$email' where user_id  = ' $_SESSION[id]'";

                        if ($conn->query($update) === TRUE) {
                            $status = "success";
                            $message = "Profile Updated";
                        } else {
                            $status = "danger";
                            $message = "Failed Profile Update";
                        }
                    }
                    ?>
                    <?php

                    $sql = "SELECT * from user_tbl where user_id = '   $_SESSION[id] '";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {





                    ?>
                            <div class="card border-0">
                                <?php
                                if (isset($status) && isset($message)) { ?>
                                    <div class="p-2  text-center " style="background-color:lightgreen;">
                                        <span class="text-<?= $status ?> text-white "><?= $message ?></span>
                                    </div>
                                <?php   }
                                ?>
                                <h2 class="text-info text-center ">Profile</h2>
                                <div class="card-body">

                                    <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Username</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" placeholder="Staff Username" value=<?= $row['username'] ?> name="username" class="form-control p-0 border-0" required />
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="example-email" class="col-md-12 p-0">Email</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="email" placeholder="sample@admin.com" value=<?= $row['email'] ?> name="email" class="form-control p-0 border-0" id="example-email" required />
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Password</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="password" value=<?= $row['password'] ?> name="password" class="form-control p-0 border-0" required />
                                            </div>
                                        </div>



                                        <div class="form-group mb-4">
                                            <div class="col-md-12 border-bottom p-2">
                                                <input type="submit" name="submit" class="btn btn-success " value="Update Profile" />
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                    <?php  }
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center w-100 ">
                            <h1>My Recipes</h1>
                            <h1><a href="./addUserRecipe.php">Add my own recipe</a></h1>
                        </div>
                    </div>
                    <div class="row">

                        <div class="boxThumbnail">
                            <div class="gridContainer">
                                <?php


                                $sql = " 
                                SELECT recipe_tbl.`title`, recipe_tbl.`date_created`, recipe_tbl.`cuisine` , recipe_tbl.recipe_id, recipe_tbl.type, recipe_tbl.`description`, comment_tbl.`ratings`, recipe_tbl.`image` FROM recipe_tbl LEFT JOIN comment_tbl 
                               ON comment_tbl.`recipe_id` = recipe_tbl.`recipe_id` INNER JOIN favorites_tbl ON favorites_tbl.`recipe_id` = recipe_tbl.`recipe_id` WHERE favorites_tbl.`user_id` = '$_SESSION[id]'  GROUP BY recipe_tbl.recipe_id ";
                                $result = $conn->query($sql);
                                // $rowGlobal = $result->fetch_assoc();
                                if ($result->num_rows > 0) {



                                    while ($row = $result->fetch_assoc()) {

                                        $sqlRatings = "   SELECT SUM(ratings) as totalRatings, COUNT(comment_id) as ratingID FROM comment_tbl where recipe_id = '$row[recipe_id]' ";
                                        $resultRatings = $conn->query($sqlRatings);
                                        $rowGlobalRatings = $resultRatings->fetch_assoc();

                                ?>
                                        <div class="items">

                                            <div class="item">

                                                <a href="latestRecipes.php?favorites=<?= $row['recipe_id'] ?>">
                                                    <div class="badge">
                                                        <img src="../../server/assets/images/heart1.png" alt="First slide">
                                                    </div>
                                                </a>
                                                <a href="../pages/recipe.php?id=<?= $row['recipe_id'] ?>">
                                                    <img class="d-block w-100 image" src="<?= "../../server/uploads/images/$row[image]" ?>" alt="First slide">
                                                    <div class="title">
                                                        <div class="title-type">
                                                            <span><?= $row['type'] ?></span><span class="date"><?= $row['date_created'] ?></span>
                                                        </div>
                                                        <h4><?= $row['title'] ?></h4>
                                                        <div class="d-flex align-items-center">
                                                            <?php

                                                            if ($rowGlobalRatings['totalRatings'] != 0) { ?>
                                                                <?php for ($ratings = 1; $ratings <= round($rowGlobalRatings['totalRatings']   / $rowGlobalRatings['ratingID']); $ratings++) {


                                                                ?>
                                                                    <div style="width: 35px; height: 28px;">
                                                                        <img class="d-block w-100 image" src="../../server/uploads/images/star.png " alt="ratings">
                                                                    </div>

                                                                <?php     } ?>
                                                                <?php if ($rowGlobalRatings['totalRatings'] != 0) { ?>
                                                                    <span class="text-dark pl-2"><?php echo round($rowGlobalRatings['totalRatings']   / $rowGlobalRatings['ratingID'], 1)  ?></span>
                                                                <?php  } else {    ?>
                                                                    <span class="text-dark pl-2"></span>
                                                                <?php    }
                                                                ?>

                                                            <?php  }
                                                            ?>

                                                        </div>
                                                        <!-- <?= $rowGlobalRatings['totalRatings']  ?> -->
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    <?php  }
                                } else { ?>
                                    <h3 class="text-danger lead text-center">You don't have favorite recipes'</h3>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>



    </div>

<?php } else {
    include "error.php";
} ?>


<?php include "../includes/footer.php" ?>