<?php
if (isset($_GET['limit'])) {
    $limit = 3;

    $sql = "SELECT user_tbl.`username`, comment_tbl.`comment`, comment_tbl.`comment_date`, comment_tbl.`ratings`, comment_tbl.`recipe_id`,comment_tbl.`comment_date`   FROM comment_tbl INNER JOIN user_tbl ON user_tbl.`user_id` = comment_tbl.`user_id` where comment_tbl.recipe_id = '$_GET[id]' group by comment_tbl.comment_id limit '$limit'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

?>
            <div>
                <div style="width: 150px;" class="align-items-center justify-content-center mt-2">
                    <div style="height: 40px; width: 40px ; margin-left:40px;" class="d-flex justify-content-center align-items-center">
                        <img src="../assets/images/user.png" width="100%" height="100%" alt="profile-user">
                        <span class="pl-2"><?= $row['username'] ?></span>


                    </div>

                </div>
                <div class=" w-100 mt-2">

                    <div style="margin-left: 80px;">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0"><?= $row['comment'] ?></h6>

                            <div class="d-flex " style="float: right;">
                                <?php
                                if ($row['ratings'] != 0) {

                                    for ($ratings = 1; $ratings <= $row['ratings']; $ratings++) {


                                ?>
                                        <div style=" height: 15px; " class="mx-2 ">
                                            <img class=" d-block image " src=" ../../server/uploads/images/star.png " alt=" ratings">

                                        </div>
                                    <?php     } ?>
                                    <span class="ml-4"><?= $row['comment_date'] ?></span>
                                <?php } ?>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        <?php

        }
    } else { ?>
        <div class="bg-light my-4 p-4">
            <h3 class="lead">No comments available</h3>
        </div>
<?php }
}
?>