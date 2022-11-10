<?php
// Start the session
session_start();
?>
<?php include "../includes/header.php" ?>
<?php include "../includes/nav.php" ?>
<div class="container">




    <div class="section" id="latest">

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

                <?php include "../connections/config.php" ?>
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * from recipe_tbl where recipe_id = $id ";
                $result = $conn->query($sql);



                if ($result->num_rows > 0) {

                    $ratings = "";
                    while ($row = $result->fetch_assoc()) {



                        if ($row['ratings'] == null) {
                            $ratings = "";
                        } else {
                            $ratings = $row['ratings'];
                        }

                ?>


                        <div class="items">

                            <div class="item">
                                <a href="./pages/recipe.php?id=<?= $row['recipe_id'] ?>">
                                    <div class="badge">
                                        <img src="../assets/images/heart1.png" alt="First slide">
                                    </div>

                                    <img class="d-block w-100 image" src="../assets/images/f2.jpg" alt="First slide">
                                    <div class="title">
                                        <div class="title-type">
                                            <span><?= $row['type'] ?></span><span class="date"><?= $row['date_created'] ?></span>
                                        </div>
                                        <h4><?= $row['title'] ?></h4>

                                        <span><?= $ratings ?></span>


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
</div>
<?php include "../includes/footer.php" ?>