<?php include "../connections/config.php" ?>


<?php

if (isset($_POST['submit'])) {
    // get name from the form when submitted

    // image
    // video
    // cuisine
    // level
    // date
    // type
    // description
    // recipe
    $recipe = $_POST['recipe'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $level = $_POST['level'];
    $cuisine = $_POST['cuisine'];
    $video = $_POST['video'];
    // $image = $_POST['image'];
    echo $recipe;
    if (isset($_FILES['image']['name'])) {

        $file_name = $_FILES['image']['name'];


        $file_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($file_tmp, "../uploads/images/" . $file_name);

        $addquerry = "insert into recipe_tbl(title,description,type,date_created,difficulty_level,cuisine,video,image) values ('$recipe','$description','$type','$date','$level ','$cuisine','$video','$file_name')";
        $iquery = mysqli_query($conn, $addquerry);

        if ($iquery) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Recipe added successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            header("Location: ../addRecipes.php");
        } else { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Add Recipe Failed!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php }
    }
}
