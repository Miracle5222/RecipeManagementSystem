<?php
// Start the session
session_start();
?>
<?php include "../connections/config.php" ?>



<?php if (isset($_GET['deleteComment'])) {
    $recipeId = $_GET['recipeId'];

    echo $recipeId;
    echo $_GET['deleteComment'];
    // sql to delete a record
    $sql1 = "DELETE FROM mycomments_tbl WHERE userComment_Id='$_GET[deleteComment]'";

    if ($conn->query($sql1) === TRUE) {
        // echo "deleted successfully";
        // header("Location: recipe.php?id=$recipeId#comment");
        header("Location: recipe.php?id=$recipeId#comment");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} ?>



<?php if (isset($_GET['deleteMain'])) {
    $recipeId = $_GET['recipeId'];
    // sql to delete a record
    $sql = "DELETE FROM comment_tbl WHERE comment_id='$_GET[deleteMain]'";

    if ($conn->query($sql) === TRUE) {
        // echo "<script>window.location.reload()</sc>";
        // header("Location: " . $_SERVER['PHP_SELF']);
        header("Location: recipe.php?id=$recipeId#comment");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} ?>


<?php if (isset($_GET['commentId'])) {



?>
    <div class="modal fade" id="myModals">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Comment</h5>
                    <button type="button" class="close" onclick="return location.reload()" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="white-box">

                        <form method="POST" enctype="multipart/form-data" id="form">
                            <div class="d-flex m justify-content-between align-items-center">
                                <div class="form-group m-0 w-100 " style="display:none;">
                                    <label class="form-label" for=""></label>
                                    <input type="text" value="<?= $_GET['commentId'] ?>" name="commentId" required>

                                </div>
                                <div class="form-group m-0 w-100">
                                    <label class="form-label" for=""></label>

                                    <textarea name="comment" id="" required class="form-control" cols="10" placeholder="type comment..." rows="1"></textarea>
                                </div>
                                <div class="form-group m-0 align-self-end ml-3">
                                    <label class="form-label" for=""></label>

                                    <input type="submit" class="btn btn-outline-success" name="addComment" value="send">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>




<?php
} ?>