<?php include "../connections/config.php" ?>

<?php



$recipe = $_POST['recipe'];
$Ingredients = $_POST['Ingredients'];

echo   $recipe;
echo  $Ingredients;
$ingredientsQuery = "INSERT INTO ingridient_tbl (ingridient_name,recipe_id) VALUES ('$Ingredients','$recipe')";

$iquery = $conn->query($ingredientsQuery);


if ($iquery) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Ingredients added successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

} else { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Failed to add Ingredients</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }

?>