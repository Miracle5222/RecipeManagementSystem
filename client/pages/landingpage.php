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
                        <a class="nav-link" href="#popular">Popular Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#latest">Latest Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Ingredients</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="#">Meat</a>
                            <a class="dropdown-item" href="#">Sea Fod</a>
                            <a class="dropdown-item" href="#">Vegetables</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">Fruits</a>
                            <a class="dropdown-item" href="#">Beef</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Cuisine</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="#">Filipino</a>
                            <a class="dropdown-item" href="#">Chinese</a>
                            <a class="dropdown-item" href="#">Mixican</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">German</a>
                            <a class="dropdown-item" href="#">Japanese</a>
                            <a class="dropdown-item" href="#">Italian</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <div class="right-container">
                    <a class="nav-link" href="./control/logout.php">Logout</a>
                    <a class="nav-link" href="./control/logout.php">Sign-In</a>
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
    <div class="row">
        <?php include "../includes/homeSection.php" ?>
    </div>
    <div class="row">
        <?php include "latestRecipes.php" ?>
    </div>
    <div class="row">
        <?php include "popularRecipes.php" ?>
    </div>
    <div class="row">
        <?php include "popularRecipes.php" ?>
    </div>


</div>

<?php include "../includes/footer.php" ?>