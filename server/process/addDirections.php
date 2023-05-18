<?php include "../connections/config.php" ?>

<?php


if (isset($_POST['submit'])) {
    $recipe = $_POST['recipe'];
    $steps = $_POST['steps'];
    $direction = $_POST['direction'];
    $id = $_GET['id'];
    $image = $_GET['image'];





    $directionQuery = "INSERT INTO directions_tbl (recipe_id,heading,directions) VALUES ('$recipe','$steps','$direction')";
    $iquery = $conn->query($directionQuery);


    if ($iquery) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> direction added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        header("Location: ../recipeInfo.php?id=$id&image=$image");
    } else { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Failed to add direction</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
        header("Location: ../recipeInfo.php?id=$id&image=$image");
    }
}

?>