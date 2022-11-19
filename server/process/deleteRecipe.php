

<?php


if (isset($_GET['recipe_id'])) {
    include "../connections/config.php";
    $success = "";
    $error = "";

    $sql = "delete from recipe_tbl where  recipe_id = '$_GET[recipe_id]'";
    if ($conn->query($sql) === TRUE) {

        $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header("Location: ../recipes.php");
    } else {
        $error = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("Location: ../recipes.php");
    }
}
