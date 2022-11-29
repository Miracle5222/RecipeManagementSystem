<div class="section" id="latest">
    <div class="section-header">
        <h1>Latest Recipes</h1>
        <a href="./pages/latestRecipes.php">View More</a>
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

            if (isset($_GET['favorites']) && isset($_SESSION['id'])) {
                $fav = $_GET['favorites'];
                $userId =   $_SESSION['id'];

                $selectFav = "select * from favorites_tbl where recipe_id = '$fav'";
                $resSelect = $conn->query($selectFav);

                if ($resSelect->num_rows > 0) {
                    echo "<script type = \"text/javascript\">
        window.alert('This recipe is already added to your favorites')
        </script>";
                } else {
                    $insert = "insert into favorites_tbl(user_id,recipe_id)value('$userId','$fav')";
                    if ($conn->query($insert) === TRUE) {


                        echo "<script type = \"text/javascript\">
            window.alert('Recipe added to your favorites')
            </script>";
                    } else {
                        echo "<script type = \"text/javascript\">
            window.alert('You need to login first')
            </script>";
                    }
                }
            }
            ?>
            <?php
            $date = date('Y-m-d', strtotime('-7 days'));

            $sql = "SELECT recipe_tbl.`title`, recipe_tbl.`date_created`, recipe_tbl.`cuisine` , recipe_tbl.recipe_id, recipe_tbl.type, recipe_tbl.`description`, comment_tbl.`ratings`, recipe_tbl.`image` FROM recipe_tbl LEFT JOIN comment_tbl ON comment_tbl.`recipe_id` = recipe_tbl.`recipe_id` where recipe_tbl.date_created > '$date' group by recipe_tbl.recipe_id";
            $result = $conn->query($sql);
            // $rowGlobal = $result->fetch_assoc();
            if ($result->num_rows > 0) {



                while ($row = $result->fetch_assoc()) {

                    $sqlRatings = "   SELECT SUM(ratings) as totalRatings, COUNT(comment_id) as ratingID FROM comment_tbl  where recipe_id = '$row[recipe_id]' ";
                    $resultRatings = $conn->query($sqlRatings);
                    $rowGlobalRatings = $resultRatings->fetch_assoc();
            ?>
                    <div class="items">

                        <div class="item">

                            <a href="index.php?favorites=<?= $row['recipe_id'] ?>">
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
                                            <?php for ($ratings = 1; $ratings <= round($rowGlobalRatings['totalRatings']   / $rowGlobalRatings['ratingID']); $ratings++) {


                                            ?>
                                                <div style="width: 35px; height: 28px;">
                                                    <img class="d-block w-100 image" src="./../server/uploads/images/star.png " alt="ratings">
                                                </div>

                                            <?php     } ?>
                                            <?php if ($rowGlobalRatings['totalRatings'] != 0) { ?>
                                                <span class="text-dark pl-2"><?php echo round($rowGlobalRatings['totalRatings']   / $rowGlobalRatings['ratingID'], 1)  ?></span>
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
            } else {
                echo "no records found";
            }
            ?>
        </div>
    </div>
</div>