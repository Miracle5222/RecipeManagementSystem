<?php
// Start the session
session_start();
?>
<?php include "../connections/config.php" ?>

<?php if (isset($_GET['addMore'])) {

    // print_r(gettype($_GET['addMore']));

?>


    <?php

    if (isset($_POST['addComment'])) {
        $id = $_POST['commentId'];
        $comment = $_POST['comment'];
        $user = $_SESSION['id'];
        $currentDate = date("Y-m-d");

        $sql = "INSERT INTO mycomments_tbl (comment_id,mycomment,user_id,comment_date) value('$id', '$comment','$user','$currentDate')";

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } ?>



    <?php
    $sql = "SELECT user_tbl.username, comment_tbl.comment_id, comment_tbl.user_id,  comment_tbl.comment, comment_tbl.comment_date, comment_tbl.ratings, comment_tbl.recipe_id, comment_tbl.comment_date 
FROM comment_tbl 
INNER JOIN user_tbl ON user_tbl.user_id = comment_tbl.user_id 
WHERE comment_tbl.recipe_id = '$_GET[id]' limit $_GET[addMore];

";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {

    ?>
            <div>
                <div class="align-items-center justify-content-center mt-2">
                    <div style="height: 40px; width: 93%; margin-left: 40px;" class="d-flex justify-content-between align-items-center ">
                        <div>
                            <img src="../assets/images/user.png" width="40px" height="40px" alt="profile-user">
                            <span class="pl-2"><?= $row['username'] ?></span>
                        </div>
                        <div style="height:20px;">

                            <?php if (isset($_SESSION['id'])) {

                                if ($_SESSION['id'] ==  $row['user_id']) {


                            ?>
                                    <div class="d-flex ">
                                        <?php
                                        $sqlLikes = "SELECT COUNT(likesCount) AS likes FROM likes_tbl WHERE likesCount = 1 and comment_id = '$row[comment_id] '";
                                        $sqlLikesResult = $conn->query($sqlLikes);
                                        if ($sqlLikesResult->num_rows > 0) {
                                            $rowLikes = $sqlLikesResult->fetch_assoc();
                                            // print_r($rowLikes);
                                        ?>
                                            <button class=" btn btn-outline-success px-lg-4  border-0" onclick="likesUp(this.value)" id="likes" value="<?= $row['comment_id'] ?>"><i class="bi bi-hand-thumbs-up d-flex justify-content-center align-items-center"><?= $rowLikes['likes']; ?></i></button>
                                        <?php } else {
                                        ?>
                                            <button class=" btn btn-outline-success px-lg-4  border-0" onclick="likesUp(this.value)" id="likes" value="<?= $row['comment_id'] ?>"><i class="bi bi-hand-thumbs-up d-flex justify-content-center align-items-center"><?= $rowLikes['likes']; ?></i></button>
                                        <?php    }


                                        ?>



                                        <button class=" btn btn-outline-info px-lg-4  border-0" onclick="addComment(this.value)" value="<?= $row['comment_id'] ?>" data-toggle="modal" data-target="#myModals"><i class="bi bi-reply "></i></button>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-success border-0" type="button" data-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <div class="dropdown-menu mt-2" style="width:auto;">
                                                <div class="d-flex justify-content-around align-items-around p-2  border-0" style="height: 60; width:auto;">
                                                    <a href="ajaxInput.php?deleteMain=<?= $row['comment_id'] ?>&recipeId=<?= $_GET['id'] ?>" class=" btn btn-outline-danger border-0 px-lg-4  mr-2"><i class="bi bi-trash3"></i></a>
                                                    <!-- <button class=" btn btn-outline-danger px-lg-4  mr-2 border-0" onclick="deleteMainComment(this.value)" id="likesDown" value="<?= $row['comment_id'] ?>"><i class="bi bi-trash3"></i></button> -->
                                                    <!-- <a href="ajaxInput.php?deleteMain=<?= $row['comment_id'] ?>&recipeId=<?= $_GET['id'] ?>" class=" btn btn-outline-info border-0 px-lg-4  mr-2"><i class="bi bi-pencil-square d-flex justify-content-center align-items-center"> </i></a> -->

                                                    <button class=" btn btn-outline-info px-2  border-0" onclick="editComment(this.value)" value="<?= $row['comment_id'] ?>"><i class="bi bi-pencil-square d-flex justify-content-center align-items-center"> </i></button>


                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php
                                } else { ?>
                                    <div class="d-flex ">
                                        <?php
                                        $sqlLikes = "SELECT COUNT(likesCount) AS likes FROM likes_tbl WHERE likesCount = 1 and comment_id = '$row[comment_id] '";
                                        $sqlLikesResult = $conn->query($sqlLikes);
                                        if ($sqlLikesResult->num_rows > 0) {
                                            $rowLikes = $sqlLikesResult->fetch_assoc();
                                            // print_r($rowLikes);
                                        ?>
                                            <button class=" btn btn-outline-success px-lg-4  border-0" onclick="likesUp(this.value)" id="likes" value="<?= $row['comment_id'] ?>"><i class="bi bi-hand-thumbs-up d-flex justify-content-center align-items-center"> &nbsp;<?= $rowLikes['likes']; ?></i></button>
                                        <?php } else {
                                        ?>
                                            <button class=" btn btn-outline-success px-lg-4  border-0" onclick="likesUp(this.value)" id="likes" value="<?= $row['comment_id'] ?>"><i class="bi bi-hand-thumbs-up d-flex justify-content-center align-items-center"> &nbsp;<?= $rowLikes['likes']; ?></i></button>
                                        <?php    }


                                        ?>

                                        <!-- <button class="btn btn-outline-success px-lg-4  border-0" onclick="likesUp(this.value)" id="likes" value="<?= $row['comment_id'] ?>"><i class="bi bi-hand-thumbs-up d-flex justify-content-center align-items-center">1</i></button> -->
                                        <button class="btn btn-outline-info px-lg-4  border-0" onclick="addComment(this.value)" value="<?= $row['comment_id'] ?>" data-toggle="modal" data-target="#myModals"><i class="bi bi-reply "></i></button>

                                    </div>
                                <?php  }
                            } else {  ?>
                                <?php

                                ?>
                                <?php
                                $sqlLikes = "SELECT COUNT(likesCount) AS likes FROM likes_tbl WHERE likesCount = 1 and comment_id = '$row[comment_id] '";
                                $sqlLikesResult = $conn->query($sqlLikes);
                                if ($sqlLikesResult->num_rows > 0) {
                                    $rowLikes = $sqlLikesResult->fetch_assoc();
                                ?>
                                    <button class=" btn btn-outline-success px-lg-4  border-0" onclick="return alert('Sign-In First')" id="likes" value="<?= $row['comment_id'] ?>"><i class="bi bi-hand-thumbs-up d-flex justify-content-center align-items-center">&nbsp; <?= $rowLikes['likes']; ?></i></button>
                                <?php }

                                ?>
                                <!-- <button class="btn btn-outline-success px-lg-4  border-0" onclick="return alert('Sign-In First')"><i class="bi bi-hand-thumbs-up">1</i></button> -->
                                <button class="btn btn-outline-info px-lg-4  border-0" onclick="return alert('Sign-In First')"><i class="bi bi-reply "></i></button>



                            <?php    } ?>
                        </div>
                    </div>

                </div>


                <div class="w-100 mt-4">
                    <div style="margin-left: 80px;" class="bg-light p-3">
                        <div class=" d-flex justify-content-between ">
                            <span class="lead" id="commentId"><?= $row['comment'] ?></span>
                            <div class="d-flex align-items-center" style="float: right;">
                                <?php
                                if ($row['ratings'] != 0) {
                                    for ($ratings = 1; $ratings <= $row['ratings']; $ratings++) {
                                ?>
                                        <div style="height: 15px;" class="mx-2">
                                            <img class="d-block image" src="../../server/uploads/images/star.png" alt="ratings">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <span class="ml-4"><?= $row['comment_date'] ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
            <?php

            // if (isset($_POST['submitComment'])) {
            //     $commentId = $_POST['commentId'];
            //     $comment = $_POST['comment'];
            //     // echo  $commentId;
            //     // echo  $comment;
            //     $sqlUpdate = "UPDATE comment_tbl SET comment='$comment' WHERE comment_id='$commentId'";

            //     if ($conn->query($sqlUpdate) === TRUE) {
            //         // echo "Record updated successfully";
            //     } else {
            //         // echo "Error updating record: " . $conn->error;
            //     }
            // }

            if (isset($_POST['EditComment'])) {
                $commentId = $_POST['commentId'];
                $comment = $_POST['comment'];

                $sql = "UPDATE comment_tbl SET comment='$comment' WHERE comment_id='$commentId'";
                if ($conn->query($sql) === TRUE) {
                    // echo "Record updated successfully";
                } else {
                    // echo "Error updating record: " . $conn->error;
                }
            }
            ?>
            <?php
            if (isset($_SESSION['id']) ==  $row['user_id']) { ?>
                <div id="editForms">

                </div>
            <?php  } else { ?>
                <div id="editForms">

                </div>
            <?php  } ?>

            <div id="inputForm">

            </div>

            <!-- reply form -->



            <?php
            $sqls = "  SELECT * FROM mycomments_tbl inner JOIN user_tbl ON user_tbl.`user_id` = mycomments_tbl.`user_id` WHERE mycomments_tbl.`comment_id` = '$row[comment_id]'";
            $results = $conn->query($sqls);

            if ($results->num_rows > 0) {
                // Output data of each row
                while ($rows = $results->fetch_assoc()) {

            ?>


                    <div>
                        <div class="align-items-center justify-content-center ml-lg-5 mt-2">
                            <div style="height: 40px; width: 93%; margin-left: 40px;" class="d-flex justify-content-between align-items-center ">
                                <div>
                                    <img src="../assets/images/man.png" width="40px" height="40px" alt="profile-user">
                                    <span class="pl-2"><?= $rows['username'] ?></span>
                                </div>
                                <div style="height:15px;">

                                    <!-- <button class="btn btn-dark px-lg-4"><i class="bi bi-hand-thumbs-down"> 2</i></button> -->
                                    <?php if (isset($_SESSION['id'])) {
                                        if ($_SESSION['id'] ==  $rows['user_id']) {

                                    ?>

                                            <div class="d-flex ">
                                                <!-- <button class=" btn btn-success px-lg-4 mr-2" onclick="likesUp(this.value)" id="likes" value="<?= $row['comment_id'] ?>"><i class="bi bi-hand-thumbs-up d-flex justify-content-center align-items-center">1</i></button> -->
                                                <a href="ajaxInput.php?deleteComment=<?= $rows['userComment_Id'] ?>&recipeId=<?= $_GET['id'] ?>" class=" btn btn-outline-danger border-0 px-lg-4  mr-2"><i class="bi bi-trash3"></i></a>
                                                <!-- <button class=" btn btn-outline-danger px-lg-4 border-0 mr-2" onclick="deleteComment(this.value)" id="likesDown" value="<?= $rows['userComment_Id'] ?>"><i class="bi bi-trash3"></i></button> -->
                                                <button class=" btn btn-outline-info px-2  border-0" onclick="openEditComment()"><i class="bi bi-pencil-square d-flex justify-content-center align-items-center"> </i></button>



                                            </div>

                                    <?php   }
                                    } ?>
                                </div>
                            </div>

                        </div>


                        <div class="w-100 mt-4">
                            <div style="margin-left: 120px;" class="bg-light p-3">
                                <div class="d-flex justify-content-between">
                                    <span class="lead" id="textComment"><?= $rows['mycomment'] ?></span>
                                    <div class="d-flex" style="float: right;">

                                        <span class="ml-4"><?= $rows['comment_date'] ?></span>

                                    </div>

                                </div>
                                <?php

                                if (isset($_POST['updateComment'])) {

                                    $userCommentId = $_POST['commentId'];
                                    $comment = $_POST['comment'];

                                    $sql = "UPDATE mycomments_tbl SET mycomment=' $comment' WHERE userComment_Id = '$userCommentId '";

                                    if ($conn->query($sql) === TRUE) {
                                        // echo "Record updated successfully";
                                        // header("Location: redirect.php?id=$_GET[id]");
                                    } else {
                                        // echo "Error updating record: " . $conn->error;
                                    }
                                }
                                ?>
                                <?php if (isset($_SESSION['id']) ==  $rows['user_id']) {





                                ?>
                                    <div id="editSubComment">
                                        <form method="POST" enctype="multipart/form-data" id="mycomment" style="display:none;">
                                            <div class="d-flex m justify-content-between align-items-center">
                                                <div class="form-group m-0 w-100 " style="display:none;">
                                                    <label class="form-label" for=""></label>
                                                    <input type="text" value="<?= $rows['userComment_Id'] ?>" name="commentId" required>

                                                </div>
                                                <div class="form-group m-0 w-100">
                                                    <label class="form-label" for=""></label>
                                                    <input type="text" value="<?= $rows['mycomment'] ?>" class="form-control" name="comment" required>
                                                    <!-- <textarea name="comment" id="" required class="form-control" cols="10" placeholder="type comment..." onkeyup="updateMycomment(this.value)" value="<?= htmlspecialchars($dataJson1); ?>" rows="1"></textarea> -->
                                                </div>
                                                <div class="form-group m-0 align-self-end ml-3">
                                                    <label class="form-label" for=""></label>

                                                    <input type="submit" class="btn btn-outline-success" name="updateComment" value="updateComment">
                                                </div>
                                                <div class="form-group m-0 align-self-end ml-3">
                                                    <label class="form-label" for=""></label>
                                                    <button class="btn btn-outline-danger" onclick="closeEditComment()">Close</button>
                                                    <!-- <input type="submit" class="btn btn-outline-danger" name="updateComment" value="Close"> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php    } ?>
                            </div>

                        </div>



                    </div>

            <?php
                }
            } ?>

        <?php
        }
    } else {
        ?>
        <div class="bg-light my-4 p-4">
            <h3 class="lead">No comments available</h3>
        </div>
    <?php
    }
    ?>




<?php

} ?>