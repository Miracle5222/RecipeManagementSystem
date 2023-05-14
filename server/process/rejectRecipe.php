
<?php
include "../connections/config.php";


if (isset($_GET['recipe_id'])) {
    $id = $_GET['recipe_id'];
    $sql = "UPDATE userrecipe_tbl SET recipeStatus='Rejected' WHERE recipe_id='$id'";

    if ($conn->query($sql) === TRUE) {

        echo "success";
        $sql = "UPDATE recipe_tbl SET status='Rejected' WHERE recipe_id='$id'";

        if ($conn->query($sql) === TRUE) {
            // echo "success";
            header("Location:../userRecipe.php");
        } else {
            // echo "failed";
            header("Location:../userRecipe.php");
        }
        // header("Location:../userRecipe.php");
    }

    $conn->close();
}
