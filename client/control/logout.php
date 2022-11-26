<?php
session_start();
session_unset();
session_destroy();


echo $id;
header("Location: ../pages/recipe.php?id=$_GET[recipeID]");
