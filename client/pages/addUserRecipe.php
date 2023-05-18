<?php
// Start the session
session_start();
?>
<?php include "../includes/header.php" ?>


<?php include "../connections/config.php" ?>
<nav>
    <div class="container">
        <div class="row">

            <div class="nav-container">
                <a class="nav-link" href="../index.php">Online Recipe Guide for Home Cook</a>
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

                            <?php
                            if (!isset($_SESSION['id'])) { ?>
                                <a class="dropdown-item" href="../pages/login.php">Sign-In</a>
                            <?php } else { ?>
                                <a class="dropdown-item" href="addUserRecipe.php">Add Recipe</a>
                                <a class="dropdown-item" href="myrecipes.php">My Recipe</a>
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
    <div class="row">

        <div class="col-md-6">
            <div style="margin-top: 20px;">
                <a href="./myrecipes.php" class="btn btn-outline-info">View my Recipe</a>
            </div>
            <div style="margin-top: 20px;">
                <?php

                if (isset($_POST['submit'])) {

                    $recipe = $_POST['recipe'];
                    $description = "$_POST[description]";
                    $description =  str_replace("'", "",  "$description");
                    $type = $_POST['type'];
                    $date = $_POST['date'];
                    $level = $_POST['level'];
                    $cuisine = $_POST['cuisine'];
                    $videoYou = $_POST['videoYou'];

                    $mainIngridients = $_POST['mainIngridients'];



                    $sql = "SELECT * FROM recipe_tbl where title = '$recipe'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) { ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert" data-auto-close="5000">
                            Recipe already exist!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } else {
                        if (isset($_FILES['image']['name'])) {

                            $file_name = $_FILES['image']['name'];


                            $file_tmp = $_FILES['image']['tmp_name'];
                            // $filePath =  "./uploads/images/$file_name";

                            move_uploaded_file($file_tmp, "../../server/uploads/images/" . $file_name);

                            $target_dir = "../../server/uploads/videos/";
                            $target_file = $target_dir . basename($_FILES["video"]["name"]);
                            $uploadOk = 1;
                            $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            // if (file_exists($target_file)) {
                            //     echo "Sorry, file already exists.";
                            //     $uploadOk = 0;
                            // }

                            // if ($_FILES["video"]["size"] > 50000000) {
                            //     echo "Sorry, your file is too large.";
                            //     $uploadOk = 0;
                            // }

                            // Allow certain file formats (in this example, we only allow mp4 format)

                            if ($uploadOk == 0) {
                                echo "Sorry, your file was not uploaded.";
                            } else {
                                if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
                                    // echo "The file " . htmlspecialchars(basename($_FILES["video"]["name"])) . " has been uploaded.";

                                    // Save data to database

                                    $file_names = $_FILES["video"]["name"];


                                    $addquerry = "insert into recipe_tbl(title,description,type,date_created,difficulty_level,cuisine,video,image,mainIngridients,videoYou,status) values ('$recipe','$description','$type','$date','$level ','$cuisine','$videoYou','$file_name','$mainIngridients','$file_names','Pending...')";
                                    $iquery = mysqli_query($conn, $addquerry);

                                    if ($iquery) { ?>


                                        <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" data-auto-close="5000">
                                            Recipe added successfully.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div> -->
                                        <?php

                                        $sql = "SELECT * FROM recipe_tbl where title =  '$recipe' and description = '$description'";
                                        $result = mysqli_query($conn, $sql);
                                        $row = $result->fetch_assoc();
                                        if ($result->num_rows > 0) {
                                            $addUserRecipe = "insert into userrecipe_tbl value(0,'$row[recipe_id]','$_SESSION[id]','Pending...')";
                                            $userRecipe = mysqli_query($conn, $addUserRecipe);
                                            if ($userRecipe) { ?>
                                                <div class="alert alert-info alert-dismissible fade show" role="alert" data-auto-close="5000">
                                                    Your recipe is being review...
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                        <?php   }
                                        }
                                        // $addquerry = "insert into recipe_tbl(title,description,type,date_created,difficulty_level,cuisine,video,image,mainIngridients,videoYou) values ('$recipe','$description','$type','$date','$level ','$cuisine','$videoYou','$file_name','$mainIngridients','$file_names')";
                                        // $iquery = mysqli_query($conn, $addquerry);
                                    } else { ?>

                                        <div class="alert alert-danger alert-dismissible fade show" role="alert" data-auto-close="5000">
                                            Add Recipe Failed!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php }
                                } else { ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" data-auto-close="5000">
                                        Sorry, there was an error uploading your file.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                <?php }
                            }
                        }
                    }
                }



                ?>
            </div>
            <div class="bg-dark" style="margin-top: 50px;margin-bottom:50px;">
                <div class="card ">
                    <h1 class="p-4 text-info text-center">Add Recipes</h1>
                </div>
                <div class="card p-4">
                    <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipe" class="form-label">Recipe</label>
                            <input type="text" class="form-control" required name="recipe" placeholder="Chicken curry..">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" required name="description" placeholder="Description..">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>

                            <select class="form-select" aria-label="Default select example" required name="type">
                                <option selected>Select Type</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Lunch">Lunch</option>



                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" required name="date">
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Difficulty Level</label>
                            <select class="form-select" aria-label="Default select example" required name="level">
                                <option selected>Select Level</option>
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>
                                <option value="hard">Hard</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cuisine" class="form-label">Cuisine</label>

                            <select class="form-select" aria-label="Default select example" required name="cuisine">
                                <option selected>Select Cuisine</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Korean">Korean</option>
                                <option value="Japanese">Japanese</option>

                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="mainIngridients" class="form-label">Main Ingridients</label>

                            <select class="form-select" aria-label="Default select example" required name="mainIngridients">
                                <option selected>Select Main Ingredients</option>
                                <option value="SeaFood">Sea Food</option>
                                <option value="Vegetables">Vegetables</option>
                                <option value="Fruits">Fruits</option>
                                <option value="Beef">Beef</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label">Youtube Tutorial</label>
                            <input type="text" class="form-control" name="videoYou" placeholder="SvV49SD99DY..">
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label">Video Tutorial</label>
                            <input type="file" class="form-control" name="video">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" required name="image">
                        </div>

                        <div class="mb-3">

                            <input type="submit" class="btn btn-success text-white" name="submit" value="Submit">
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../includes/footer.php" ?>