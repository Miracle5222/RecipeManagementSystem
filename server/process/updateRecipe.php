
<?php
include "../connections/config.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE recipe_tbl SET status='Active' WHERE recipe_id='$id'";

    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE userrecipe_tbl SET recipeStatus='Active' WHERE recipe_id='$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location:../userRecipe.php");
        } else {
            header("Location:../userRecipe.php");
        }

        header("Location:../userRecipe.php");
    } else {
        // echo "failed";
        header("Location:../userRecipe.php");
    }

    $conn->close();
}
