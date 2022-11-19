<?php
// Start the session
session_start();
?>
<?php include "./includes/header.php" ?>
<?php include "./connections/config.php" ?>
<nav>
    <div class="container">
        <div class="row">

            <div class="nav-container">
                <a class="navbar-brand" href="index.php">Home</a>


                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recipes</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item" href="./pages/recipes.php?recipe=breakfast">Breakfast</a>
                            <a class="dropdown-item" href="./pages/recipes.php?recipe=Dinner">Dinner</a>
                      
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./pages/recipes.php?recipe=Lunch">Lunch</a>

                            <a class="dropdown-item" href="./pages/recipes.php?recipe=Desserts">Desserts</a>
                            <a class="dropdown-item" href="./pages/recipes.php?recipe=Appetizer">Appetizers & Snack</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/allTypesRecipes.php">All Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/popularRecipes.php">Popular Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/latestRecipes.php">Latest Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Ingredients</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./pages/ingredients.php?ingredients=Meat">Meat</a>
                            <a class="dropdown-item" href="./pages/ingredients.php?ingredients=SeaFood">Sea Food</a>
                            <a class="dropdown-item" href="./pages/ingredients.php?ingredients=Vegetables">Vegetables</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./pages/ingredients.php?ingredients=Fruits">Fruits</a>
                            <a class="dropdown-item" href="./pages/ingredients.php?ingredients=Beef">Beef</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Cuisine</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./pages/cuisine.php?cuisine=Filipino">Filipino</a>
                            <a class="dropdown-item" href="./pages/cuisine.php?cuisine=Chinese">Chinese</a>
                            <a class="dropdown-item" href="./pages/cuisine.php?cuisine=Mixican">Mixican</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./pages/cuisine.php?cuisine=German">German</a>
                            <a class="dropdown-item" href="./pages/cuisine.php?cuisine=Japanese">Japanese</a>
                            <a class="dropdown-item" href="./pages/cuisine.php?cuisine=Italian">Italian</a>
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
    <div class="row">
        <?php include "./includes/homeSection.php" ?>
    </div>
    <div class="row">
        <?php include "./includes/latestRecipes.php" ?>
    </div>
    <div class="row">
        <?php include "./includes/popularRecipes.php" ?>
    </div>
    <div class="row">
        <?php include "./includes/allTypesRecipes.php" ?>
    </div>


</div>

<?php include "./includes/footer.php" ?>