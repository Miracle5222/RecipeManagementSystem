<?php
// Start the session
session_start();
?>
<?php include "../includes/header.php" ?><nav>
    <div class="container">
        <div class="row">

            <div class="nav-container">
                <a class="nav-link" href="../index.php">Home</a>
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
                        <a class="nav-link" href="allTypesRecipes.php">All Recipes</a>
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

                    <div>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Settings</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="#">Profile</a>
                            <a class="dropdown-item" href="#">Favorites</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container">




    <div class="section" id="latest">
        <div class="section-header">
            <h1><?= $_GET['recipe'] ?></h1>

        </div>
        <div class="boxThumbnail">
            <div class="gridContainer">


                <?php include "../connections/config.php" ?>
                <?php
                if (isset($_GET['recipe'])) {
                    $type = $_GET['recipe'];
                    $sql = "SELECT * from recipe_tbl where type = '$type' ";
                    $result = $conn->query($sql);



                    if ($result->num_rows > 0) {

                        $ratings = "";
                        while ($row = $result->fetch_assoc()) {




                ?>


                            <div class="items">

                                <div class="item">
                                    <a href="./pages/recipe.php?id=<?= $row['recipe_id'] ?>">
                                        <div class="badge">
                                            <img src="../assets/images/heart1.png" alt="First slide">
                                        </div>

                                        <img class="d-block w-100 image" src="<?= "../../server/uploads/images/$row[image]" ?>" alt="First slide">
                                        <div class="title">
                                            <div class="title-type">
                                                <span><?= $row['type'] ?></span><span class="date"><?= $row['date_created'] ?></span>
                                            </div>
                                            <h4><?= $row['title'] ?></h4>




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