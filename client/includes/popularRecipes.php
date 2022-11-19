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

            $sql = "SELECT * from recipe_tbl";
            $result = $conn->query($sql);



            if ($result->num_rows > 0) {

                $ratings = "";
                while ($row = $result->fetch_assoc()) {




            ?>


                    <div class="items">

                        <div class="item">
                            <a href="#">
                                <div class="badge">
                                    <img src="./assets/images/heart1.png" alt="First slide">
                                </div>

                                <img class="d-block w-100 image" src="<?= "./../server/uploads/images/$row[image]" ?>" alt="First slide">
                                <div class="title">
                                    <div class="title-type">
                                        <span><?= $row['type'] ?></span><span class="date"><?= $row['date_created'] ?></span>
                                    </div>
                                    <h4><?= $row['title'] ?></h4>




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