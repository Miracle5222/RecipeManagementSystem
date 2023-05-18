<?php
// Start the session
session_start();
?>
<?php include "./includes/header.php" ?>
<?php include "./connections/config.php" ?>

<?php
$arr1 = array();
$arr2 = array();

$sql1 = "SELECT distinct mainIngridients from recipe_tbl";
$result1 = $conn->query($sql1);





while ($row = $result1->fetch_assoc()) {
    $arr2 = $row['mainIngridients'];
    array_push($arr1, $arr2);
}
$_SESSION['mainIngridients'] = $arr1;

?>

<nav>
    <div class="container">
        <div class="row">

            <div class="nav-container">
                <a class="navbar-brand" href="index.php">Online Recipe Guide for Home Cook</a>


                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recipes</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item" href="./pages/recipes.php?recipe=breakfast">Breakfast</a>
                            <a class="dropdown-item" href="./pages/recipes.php?recipe=Dinner">Dinner</a>
                            <a class="dropdown-item" href="./pages/recipes.php?recipe=Lunch">Lunch</a>


                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./pages/popularRecipes.php">Popular Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/latestRecipes.php">Latest Recipes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Cuisine</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./pages/cuisine.php?cuisine=Filipino">Filipino</a>
                            <a class="dropdown-item" href="./pages/cuisine.php?cuisine=Korean">Korean</a>
                            <a class="dropdown-item" href="./pages/cuisine.php?cuisine=Japanese">Japanese</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/about.php">About</a>
                    </li>
                    <li>
                        <input type="text" id="txt1" class="form-control" placeholder="search keywords..." onkeyup="showHint(this.value)">
                        <div style="position: absolute; z-index:99;max-width: 300px; margin-top: 10px;" class="d-inline-block ">
                            <p><span id="txtHint"></span></p>
                        </div>
                    </li>
                </ul>

                <div class="right-container">

                    <div>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Settings</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./pages/profile.php">Profile</a>

                            <?php
                            if (!isset($_SESSION['id'])) { ?>
                                <a class="dropdown-item" href="./pages/login.php">Sign-In</a>
                            <?php } else { ?>
                                <a class="dropdown-item" href="./pages/addUserRecipe.php">Add Recipe</a>
                                <a class="dropdown-item" href="./pages/myrecipes.php">My Recipe</a>
                                <a class="dropdown-item" href="./control/logout.php">Logout</a>
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

<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("txtHint").innerHTML =
                this.responseText;
        }
        xhttp.open("GET", "./control/data1.php?hint=" + str);
        xhttp.send();
    }
</script>

<?php include "./includes/footer.php" ?>