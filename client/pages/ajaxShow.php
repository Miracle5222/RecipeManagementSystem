<?php
// Start the session
session_start();
?>
<?php include "../connections/config.php" ?>

<?php if (isset($_GET['commentId'])) {


    $sql = "SELECT * from comment_tbl where comment_id ='$_GET[commentId]' ";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {



?>

            <div class="d-flex justify-content-end position-relative">

                <form method="POST" enctype="multipart/form-data" id="form" style="width:400px;">
                    <div class="d-flex m justify-content-between align-items-center">
                        <div class="form-group m-0 w-100 " style="display:none;">
                            <label class="form-label" for=""></label>
                            <input type="text" value="<?= $_GET['commentId'] ?>" name="commentId" required>

                        </div>
                        <div class="form-group m-0 w-100">
                            <label class="form-label" for=""></label>

                            <textarea name="comment" required class="form-control" cols="10" placeholder="type comment..." rows="1"><?= $row['comment'] ?></textarea>
                        </div>
                        <div class="form-group m-0 align-self-end ml-3">
                            <label class="form-label" for=""></label>

                            <input type="submit" class="btn btn-outline-success" name="EditComment" value="send">
                        </div>

                    </div>
                </form>



                <!-- <form method="POST" enctype="multipart/form-data" style="width: 400px;">
                    <div class="d-flex m justify-content-between align-items-center">
                        <div class="form-group m-0 w-100 " style="display:none;">
                            <label class="form-label" for=""></label>
                            <input type="text" value="<?= $row['comment_id'] ?>" name="commentId" required>

                        </div>
                        <div class="form-group m-0 w-100">
                            <label class="form-label" for=""></label>

                            <textarea name="comment" required class="form-control" cols="10" placeholder="type comment..." rows="1"><?= $row['comment'] ?></textarea>
                        </div>
                        <div class="form-group m-0 align-self-end ml-3">
                            <label class="form-label" for=""></label>

                            <input type="submit" class="btn btn-outline-success" name="submitComment" value="Update">
                        </div>


                    </div>
                </form>
                <div class="form-group m-0 align-self-end ml-3">
                    <button class="btn btn-outline-danger" onclick="closeEdit()">Close</button>
                </div> -->



            </div>






<?php
        }
    }
} else {
    echo "0 results";
} ?>