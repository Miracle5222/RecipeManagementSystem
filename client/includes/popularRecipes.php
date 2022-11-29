<div class="section2" id="popular">

    <div class="section-header">
        <h1>Popular Recipes</h1>
        <a href="./pages/popularRecipes.php">View More</a>
    </div>
    <div class="boxThumbnail">
        <div class="gridContainer">
            <!-- <div class="items">

            <div class="item">
                <div class="badge">
                    <img src="./assets/images/heart.png" alt="First slide">
                </div>
                <img class="d-block w-100 image" src="./assets/images/f1.jpg" alt="First slide">
            </div>
            <div class="title">
                <h4>title</h4>

            </div>
        </div> -->


            <?php
            $sql = "SELECT recipe_tbl.`title`, recipe_tbl.`date_created`, recipe_tbl.`cuisine` , recipe_tbl.recipe_id, recipe_tbl.type, recipe_tbl.`description`, comment_tbl.`ratings`, recipe_tbl.`image` FROM recipe_tbl LEFT JOIN comment_tbl ON comment_tbl.`recipe_id` = recipe_tbl.`recipe_id`  group by recipe_tbl.recipe_id";
            $result = $conn->query($sql);
            // $rowGlobal = $result->fetch_assoc();
            if ($result->num_rows > 0) {

                $num = 0;


                while ($row = $result->fetch_assoc()) {

                    $sqlRatings = "   SELECT avg(ratings) as totalRatings, COUNT(comment_id) as ratingsNum FROM comment_tbl where recipe_id = '$row[recipe_id]' ";
                    $resultRatings = $conn->query($sqlRatings);
                    $rowGlobalRatings = $resultRatings->fetch_assoc();

                    if ($rowGlobalRatings['totalRatings'] > 2) {
                        $num++;




            ?>
                        <div class="items">

                            <div class="item">

                                <a href="#">
                                    <div class="badge">
                                        <img src="./../server/assets/images/heart1.png" alt="First slide">
                                    </div>
                                </a>
                                <a href="./pages/recipe.php?id=<?= $row['recipe_id'] ?>">
                                    <img class="d-block w-100 image" src="<?= "./../server/uploads/images/$row[image]" ?>" alt="First slide">
                                    <div class="title">
                                        <div class="title-type">
                                            <span><?= $row['type'] ?></span><span class="date"><?= $row['date_created'] ?></span>
                                        </div>
                                        <h4><?= $row['title'] ?></h4>
                                        <div class="d-flex align-items-center">
                                            <?php

                                            if ($rowGlobalRatings['totalRatings'] != 0) { ?>
                                                <?php for ($ratings = 1; $ratings <= round($rowGlobalRatings['totalRatings']   / $rowGlobalRatings['ratingsNum']); $ratings++) {


                                                ?>
                                                    <div style="width: 35px; height: 28px;">
                                                        <img class="d-block w-100 image" src="./../server/uploads/images/star.png " alt="ratings">
                                                    </div>

                                                <?php     } ?>
                                                <?php if ($rowGlobalRatings['totalRatings'] != 0) { ?>
                                                    <span class="text-dark pl-2"><?php echo round($rowGlobalRatings['totalRatings'], 1)  ?></span>
                                                <?php  } else {    ?>
                                                    <span class="text-dark pl-2"></span>
                                                <?php    }
                                                ?>

                                            <?php  }
                                            ?>

                                        </div>
                                        <!-- <?= $rowGlobalRatings['totalRatings']  ?> -->
                                    </div>
                                </a>
                            </div>

                        </div>
            <?php  }
                }
                $_SESSION['total'] =   $num;
            } else {
                echo "no records found";
            }


            ?>



        </div>
    </div>


</div>