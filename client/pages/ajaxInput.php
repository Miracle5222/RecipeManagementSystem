<?php
// Start the session
session_start();
?>
<?php


?>

<?php if (isset($_GET['commentId'])) {



?>


    <form method="POST" enctype="multipart/form-data" id="form">
        <div class="d-flex m justify-content-between align-items-center" style="width:400px;margin-left: 180px;">
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

                <input type="submit" class="btn btn-outline-success" name="submitComment" value="send">
            </div>
            <div class="form-group m-0 align-self-end ml-1">


                <button onclick="closeInput()" class="btn btn-outline-danger">close</button>
            </div>
        </div>
    </form>


<?php
} ?>