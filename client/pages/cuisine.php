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

                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./recipes.php?recipe=Lunch">Lunch</a>

                            <a class="dropdown-item" href="./recipes.php?recipe=Desserts">Desserts</a>
                            <a class="dropdown-item" href="./recipes.php?recipe=Appetizer">Appetizers & Snack</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="popularRecipes.php">Popular Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="latestRecipes.php">Latest Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Ingredients</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./ingredients.php?ingredients=Meat">Meat</a>
                            <a class="dropdown-item" href="./ingredients.php?ingredients=Sea Food">Sea Food</a>
                            <a class="dropdown-item" href="./ingredients.php?ingredients=Vegetables">Vegetables</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./ingredients.php?ingredients=Fruits">Fruits</a>
                            <a class="dropdown-item" href="./ingredients.php?ingredients=Beef">Beef</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Cuisine</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./cuisine.php?cuisine=Filipino">Filipino</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Chinese">Chinese</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Mixican">Mixican</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./cuisine.php?cuisine=German">German</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Japanese">Japanese</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Italian">Italian</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <div class="right-container">
                    <!-- <a class="nav-link" href="./control/logout.php">Logout</a>
                    <a class="nav-link" href="./control/logout.php">Sign-In</a> -->
                    <div>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Settings</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="#">Profile</a>
                            <a class="dropdown-item" href="#">Favorites</a>
                            <a class="dropdown-item" href="../control/logout.php">Logout</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container">




    <div class="section" id="latest">

        <div class="boxThumbnail">
            <div class="gridContainer">


                <?php include "../connections/config.php" ?>
                <?php
                if (isset($_GET['cuisine'])) {
                    $cuisine = $_GET['cuisine'];


                    $sql = "SELECT recipe_tbl.`title`, recipe_tbl.`date_created`, recipe_tbl.`cuisine` , recipe_tbl.recipe_id, recipe_tbl.type, recipe_tbl.`description`, comment_tbl.`ratings`, recipe_tbl.`image` FROM recipe_tbl LEFT JOIN comment_tbl ON comment_tbl.`recipe_id` = recipe_tbl.`recipe_id` where recipe_tbl.cuisine = '$cuisine' group by recipe_tbl.recipe_id";
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

                                    <a href="#">
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
                    } else {
                        echo "no records found";
                    }
                }
                ?>




            </div>
        </div>


    </div>
</div>

<?php include "../includes/footer.php" ?>