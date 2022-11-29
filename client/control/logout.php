<?php
session_start();
session_unset();
session_destroy();


echo $id;


if (isset($_GET['recipeID'])) {
    header("Location: ../pages/recipe.php?id=$_GET[recipeID]");
} else {
    header("Location: ../pages/login.php");
}
