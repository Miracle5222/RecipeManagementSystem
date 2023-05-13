<?php
// Start the session
session_start();
?>
<?php include "../includes/header.php" ?>


<?php include "../connections/config.php" ?>

<?php
$arr1 = array();
$arr2 = array();

$sql1 = "SELECT distinct mainIngridients from recipe_tbl";
$result1 = $conn->query($sql1);


if (isset($_GET['id'])) {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $identifier = md5($user_agent);
    $sql = "insert into views_tbl value(0,'$_GET[id]',1,'$identifier')";
    // $sql = "UPDATE views_tbl SET views=  1 WHERE recipe_id='$_GET[id]'";

    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
        // echo "$_SERVER[HTTP_USER_AGENT]";
    } else {
        // echo "Error updating record: " . $conn->error;
    }
}



while ($row = $result1->fetch_assoc()) {
    $arr2 = $row['mainIngridients'];
    array_push($arr1, $arr2);
}
$_SESSION['mainIngridients'] = $arr1;

?>
<nav>
    <div class="container">
        <div class="row">

            <div class="nav-container">
                <a class="nav-link" href="../index.php">Recipe Management System</a>
                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recipes</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item" href="./recipes.php?recipe=breakfast">Breakfast</a>
                            <a class="dropdown-item" href="./recipes.php?recipe=Dinner">Dinner</a>
                            <a class="dropdown-item" href="./recipes.php?recipe=Lunch">Lunch</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="popularRecipes.php">Popular Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="latestRecipes.php">Latest Recipes</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Ingredients</a>
                        <div class="dropdown-menu border-0 orange">
                            <?php
                            foreach ($_SESSION['mainIngridients'] as $ingredients) : ?>
                                <a class="dropdown-item " href="./ingredients.php?ingredients=<?= $ingredients ?>"><?= $ingredients ?></a>
                            <?php endforeach;
                            ?>
                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Cuisine</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./cuisine.php?cuisine=Filipino">Filipino</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Korean">Korean</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Japanese">Japanese</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">About</a>
                    </li>
                    <?php include "./search.php" ?>
                </ul>
                <div class="right-container">

                    <div>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Settings</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="../pages/profile.php">Profile</a>
                            <a class="dropdown-item" href="#">Favorites</a>
                            <?php
                            if (!isset($_SESSION['id'])) { ?>
                                <a class="dropdown-item" href="../pages/login.php">Sign-In</a>
                            <?php } else { ?>

                                <a class="dropdown-item" href="../control/logout.php">Logout</a>
                            <?php }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">

    <?php
    $id = $_GET['id'];
    $sqlRatings = "   SELECT SUM(ratings) as totalRatings, COUNT(comment_id) as ratingID FROM comment_tbl where recipe_id = $id ";
    $resultRatings = $conn->query($sqlRatings);
    $rowGlobalRatings = $resultRatings->fetch_assoc();
    ?>

    <?php
    $id = $_GET['id'];
    $sql = "SELECT  recipe_tbl.`recipe_id`, recipe_tbl.`title`, recipe_tbl.`videoYou`,  recipe_tbl.`date_created` , recipe_tbl.`type`, recipe_tbl.`cuisine` , recipe_tbl.`description`, ratings_tbl.`ratings`, recipe_tbl.video , recipe_tbl.image FROM recipe_tbl LEFT JOIN ratings_tbl ON ratings_tbl.`recipe_id` = recipe_tbl.`recipe_id`  where recipe_tbl.recipe_id = $id ";
    $result = $conn->query($sql);
    $rowGlobal = $result->fetch_assoc();


    $sqlViews = "SELECT COUNT(DISTINCT users) as views FROM views_tbl where recipe_id = '$_GET[id]'";
    $resultViews = $conn->query($sqlViews);
    $rowGlobalViews = $resultViews->fetch_assoc();

    ?>
    <div class="section" id="latest">


        <div class="row">
            <div class="col-8 my-4">
                <div class="d-flex align-items-center justify-content-around " style="height: 50px;">
                    <div class="title p-0 px-2">
                        <h2 style="color:#ff2f01"><?= $rowGlobal['title'] ?></h2>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php
                        if ($rowGlobalRatings['totalRatings'] != 0) {

                            for ($ratings = 1; $ratings <= round($rowGlobalRatings['totalRatings']   / $rowGlobalRatings['ratingID']); $ratings++) {


                        ?>
                                <div style=" width: 28px; height: 18px;margin:2px; " class="mx-2 ">
                                    <img class=" d-block w-100 image " src=" ../../server/uploads/images/star.png " alt=" ratings">

                                </div>
                        <?php     }
                        } ?>
                        <?php
                        if ($rowGlobalRatings['totalRatings'] != 0) { ?>
                            <span class="text-dark pl-2"><?php echo round($rowGlobalRatings['totalRatings']   / $rowGlobalRatings['ratingID'], 1)  ?></span>
                        <?php  } else {    ?>
                            <span class="text-dark">No ratings yet</span>
                        <?php    }
                        ?>

                        <?php

                        if ($rowGlobalViews['views'] != 0) { ?>
                            <span class="text-primary pl-2">Views: <?php echo $rowGlobalViews['views'] ?></span>
                        <?php  } else {    ?>
                            <span class="text-dark">No views yet</span>
                        <?php    }
                        ?>

                    </div>
                    <div class="px-2">
                        <a href="#comment" class=" text-info">comments</a>
                    </div>

                </div>

                <div class="embed-responsive embed-responsive-16by9">


                    <?php

                    if (!empty($rowGlobal['videoYou'])) {     ?>
                        <video width="320" height="240" controls>
                            <source src="../../server/uploads/videos/<?= $rowGlobal['videoYou'] ?>" type="video/mp4">
                            <source src="../../server/uploads/videos/<?= $rowGlobal['videoYou'] ?>" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>

                    <?php  } else {     ?>
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $rowGlobal['video'] ?>" allowfullscreen></iframe>
                    <?php  }  ?>





                </div>
                <div class="mt-2">
                    <h5 class="lead"><?= $rowGlobal['description'] ?></h5>
                </div>

                <div class="col-md-6 my-4 p-0">
                    <table class="table table-striped table-hover border-0">
                        <thead>
                            <tr>
                                <!-- <th scope="col">ID</th> -->
                                <th scope="col">
                                    <h3>Ingredients</h3>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM ingridient_tbl where  recipe_id = '$_GET[id]'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                            ?>
                                    <tr>

                                        <!-- <td><?= $row['ingridient_id'] ?></td> -->
                                        <td><?= $row['ingridient_name'] ?></td>




                                    </tr>
                                <?php

                                }
                            } else { ?>
                                <tr>

                                    <td class="w-100 text-center " colspan="2">No Ingredients Available</td>

                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>

                </div>
                <div style="height: 400px; width: 100%">

                    <img class="d-block w-100 image" style="background-size:cover; background-position:center;background-repeat:no-repeat;height:100%" src="<?= "../../server/uploads/images/$rowGlobal[image]" ?>" alt="recipe">
                </div>
            </div>
            <div class="col-md-4 my-4">

                <div class="section-header">
                    <h1>Latest Recipes</h1>

                </div>
                <div class="boxThumbnail">
                    <div class="gridContainer">


                        <?php
                        $sql = "SELECT recipe_tbl.`title`, recipe_tbl.`date_created`, recipe_tbl.`cuisine` ,recipe_tbl.`type` , recipe_tbl.recipe_id, recipe_tbl.`description`, ratings_tbl.`ratings`, recipe_tbl.`image` FROM recipe_tbl LEFT JOIN ratings_tbl ON ratings_tbl.`recipe_id` = recipe_tbl.`recipe_id` group by recipe_tbl.title limit 4";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {


                            while ($row = $result->fetch_assoc()) {
                                $sqlRatings = "   SELECT SUM(ratings) as totalRatings, COUNT(comment_id) as ratingID FROM comment_tbl where recipe_id = '$row[recipe_id]' ";
                                $resultRatings = $conn->query($sqlRatings);
                                $rowGlobalRatings = $resultRatings->fetch_assoc();

                        ?>
                                <div class="items">

                                    <div class="item">

                                        <a href="#">
                                            <div class="badge">
                                                <img src="../../server/assets/images/heart1.png" alt="First slide">
                                            </div>
                                        </a>
                                        <a href="recipe.php?id=<?= $row['recipe_id'] ?>">
                                            <img class=" d-block w-100 image" src="<?= "../../server/uploads/images/$row[image]" ?>" alt="First slide">
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
                                                                <img class="d-block w-100 image" src="../../server/uploads/images/star.png " alt="ratings">
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


        <div class="row">
            <div class="col-md-6">
                <h3>Directions</h3>
                <ol class="list-group list-group-numbered my-4">


                    <?php

                    $sql = "SELECT * FROM directions_tbl where  recipe_id = '$_GET[id]' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                    ?>

                            <li class="list-group-item fs-4 p-0  border-0 font-weight-bold">
                                <h4>Step<?= $row['heading'] ?></h4>
                            </li>
                            <li class="list-group-item border-0 fs-5"><?= $row['directions'] ?>

                            </li>

                        <?php

                        }
                    } else { ?>
                        <li class="list-group-item border-0 text-center fs-4">No Directions Available</li>
                    <?php  }
                    ?>
                </ol>

                <div style="height: 200px;" class="bg-dark d-flex justify-content-center align-items-center">
                    <h4 class="text-center text-white">Reviews</h4>


                </div>
                <div class="card p-4 bg-light">
                    <?php

                    if (isset($_POST['submit'])) {
                        $date = date("Y-m-d");
                        $comment = $_POST['comment'];
                        $ratings = $_POST['ratings'];
                        // echo $comment;
                        // echo $ratings;
                        // echo $_GET['id'];
                        // echo $_SESSION['id'];

                        $addquerry = "insert into comment_tbl(recipe_id,user_id,comment,comment_date,ratings)values('$_GET[id]',' $_SESSION[id]','$comment','$date','$ratings')";
                        $iquery = mysqli_query($conn, $addquerry);



                        if ($iquery) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                your comment is being review...
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php  } else { ?>

                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Make sure the field is not empty
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <?php }
                    }

                    ?>
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <div style="width: 150px;" class="align-items-start justify-content-center">
                            <div style="height: 40px; width: 40px ; margin-left:40px;" class="d-flex justify-content-center align-items-center">
                                <img src="../assets/images/user.png" width="100%" height="100%" alt="profile-user">

                                <?php
                                if (!isset($_SESSION['id'])) { ?>
                                    <span class="pl-2"></span>
                                <?php    } else { ?>

                                    <span class="pl-2">Name: <?= $_SESSION['username'] ?></span>
                                <?php }

                                ?>

                            </div>
                        </div>
                        <div class=" w-100 mt-2" id="comment">
                            <form method="POST" enctype="multipart/form-data">

                                <div class="d-flex flex-row mt-2 justify-content-between">

                                    <!-- <label class="form-label" for="">Rate: </label> -->
                                    <select style="width: 80px; " class=" form-control" id="exampleFormControlSelect1" name="ratings">
                                        <?php
                                        $rate;
                                        for ($rate = 1; $rate <= 5; $rate++) { ?>

                                            <option value=" <?= $rate ?>"><?= $rate ?></option>
                                        <?php  } ?>


                                    </select>


                                    <?php
                                    $star;
                                    for ($star = 1; $star <= 5; $star++) { ?>
                                        <div style=" width: 28px; height: 18px;margin:2px;">

                                            <a href=""> <img width="100%" height="100%" src=" ../../server/uploads/images/star.png " alt=" ratings"></a>
                                            <!-- <span style="margin-left: 10px;"><?php echo $star ?></span> -->

                                        </div>

                                    <?php  } ?>

                                </div>


                                <div class="form-group m-0">
                                    <label class="form-label" for=""></label>

                                    <textarea name="comment" id="" required class="form-control" cols="10" placeholder="type comment..." rows="3"></textarea>
                                </div>
                                <div class="form-group " style="float: right; margin-top:15px;">

                                    <?php
                                    if (!isset($_SESSION['id'])) { ?>
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Sign-In First
                                        </button> -->
                                        <a href="login.php">Sign-In First</a>
                                    <?php  } else { ?>

                                        <input type="submit" value="Submit" name="submit" class="btn btn-info">
                                    <?php }

                                    ?>


                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                        <?php
                        if (isset($_POST["submitUser"])) {

                            $sql = "SELECT * from user_tbl";
                            $result = $conn->query($sql);

                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            // echo $username;

                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    if ($username == $row['username'] && $password == $row["password"]) {
                                        $_SESSION['id'] = $row['user_id'];
                                        $_SESSION['username'] = $row['username'];
                                        $_SESSION['email'] = $row['email'];

                                        // echo "<script type = \"text/javascript\">
                                        // window.location = (\"recipe.php?id=$_GET[id]#comment\")
                                        // </script>";
                                    } else {
                                    }
                                }
                            } else {
                                echo "no records found";
                            }
                        }
                        ?>
                        <!-- Modal -->
                        <div class="col-md-4">
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form class="d-flex h-100 justify-content-center align-items-center flex-column" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">

                                                <h1 class="text-dark modal-title" id="exampleModalLongTitle">Login</h1>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <div class="mb-3">
                                                    <label for="Username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="Username" name="username" required placeholder="Username">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="Password" name="password" required placeholder="Password">
                                                </div>

                                                <div class="mb-3">
                                                    <p>Don't have account? <a href="./register.php">Register</a></p>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                <input type="submit" name="submitUser" value="Submit" class="btn btn-info" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                $sql = "SELECT user_tbl.`username`, comment_tbl.`comment`, comment_tbl.`comment_date`, comment_tbl.`ratings`, comment_tbl.`recipe_id`,comment_tbl.`comment_date`   FROM comment_tbl INNER JOIN user_tbl ON user_tbl.`user_id` = comment_tbl.`user_id` where comment_tbl.recipe_id = '$_GET[id]' group by comment_tbl.comment_id limit 2";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                ?>
                        <div id="txtHint">
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
                ?>
                <div class="d-flex justify-content-center mt-4">
                    <button type="button" class="btn btn-primary" onclick="showHint()" id="show-more-button">Show More</button>

                </div>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-4">

                <div class="section-header">
                    <h1>Related Recipes</h1>

                </div>
                <div class="boxThumbnail">
                    <div class="gridContainer">


                        <?php
                        $sql = "SELECT recipe_tbl.`title`, recipe_tbl.`date_created`,  recipe_tbl.`type`, recipe_tbl.`cuisine` , recipe_tbl.recipe_id, recipe_tbl.`description`, ratings_tbl.`ratings`, recipe_tbl.`image` FROM recipe_tbl LEFT JOIN ratings_tbl ON ratings_tbl.`recipe_id` = recipe_tbl.`recipe_id` where recipe_tbl.type = '$rowGlobal[type]' group by recipe_tbl.title limit 4";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {


                            while ($row = $result->fetch_assoc()) {

                                $sqlRatings = "   SELECT SUM(ratings) as totalRatings, COUNT(comment_id) as ratingID FROM comment_tbl where recipe_id = '$row[recipe_id]' ";
                                $resultRatings = $conn->query($sqlRatings);
                                $rowGlobalRatings = $resultRatings->fetch_assoc();

                        ?>
                                <div class="items">

                                    <div class="item">

                                        <a href="#">
                                            <div class="badge">
                                                <img src="../../server/assets/images/heart1.png" alt="First slide">
                                            </div>
                                        </a>
                                        <a href="recipe.php?id=<?= $row['recipe_id'] ?>">
                                            <img class="d-block w-100 image" src="<?= "../../server/uploads/images/$row[image]" ?>" alt="First slide">
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
                                                                <img class="d-block w-100 image" src="../../server/uploads/images/star.png " alt="ratings">
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
                                            </div>
                                        </a>
                                    </div>

                                </div>
                        <?php  }
                        } else {
                            echo "no records found";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "showMore.php", true);
                xmlhttp.send();
            }
        }
    </script>

</div>
<?php include "../includes/footer.php" ?>