<?php
// Start the session
session_start();
?>
<?php include_once "../includes/header.php" ?>
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

                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./recipes.php?recipe=Lunch">Lunch</a>

                            <a class="dropdown-item" href="./recipes.php?recipe=Desserts">Desserts</a>
                            <a class="dropdown-item" href="./recipes.php?recipe=Appetizer">Appetizers & Snack</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="popularRecipes.php">Popular Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="latestRecipes.php">Latest Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Ingredients</a>
                        <div class="dropdown-menu border-0 orange">

                            <?php
                            foreach ($_SESSION['mainIngridients'] as $ingredients) : ?>
                                <a class="dropdown-item " href="./ingredients.php?ingredients=<?= $ingredients ?>"><?= $ingredients ?></a>
                            <?php endforeach;
                            ?>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">Cuisine</a>
                        <div class="dropdown-menu border-0 orange">
                            <a class="dropdown-item " href="./cuisine.php?cuisine=Filipino">Filipino</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Chinese">Chinese</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Mixican">Mixican</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./cuisine.php?cuisine=German">German</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Japanese">Japanese</a>
                            <a class="dropdown-item" href="./cuisine.php?cuisine=Italian">Italian</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
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
<?php include_once "../connections/config.php" ?>
<div class="login">


    <div class="login-form">
        <?php
        if (isset($_POST["submit"])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * from user_tbl where username = '$username' and password = '$password'";
            $result = $conn->query($sql);
            $row =  $result->fetch_assoc();

            // echo $username;
            // echo $password;

            if ($result->num_rows > 0) {
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];

                echo "<script type = \"text/javascript\">
                                        window.location = (\"../index.php\")
                                        </script>";
                // header("Location: ../index.php");
                // while ($row = $result->fetch_assoc()) {
                //     if ($username == $row['username'] && $password == $row["password"]) {
                //         $_SESSION['id'] = $row['user_id'];
                //         $_SESSION['username'] = $row['username'];
                //         $_SESSION['email'] = $row['email'];
                //     } else {
                //     }
                // }
            } else {
                echo "no records found";
            }
            $conn->close();
        }
        ?>

        <form class="d-flex h-100 justify-content-center align-items-center flex-column bg-light py-4" method="post" enctype="multipart/form-data">
            <h1 class="text-dark">Login</h1>
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username" name="username" required placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password" required placeholder="Password">
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-3 button" name="submit" value="Submit" />
            </div>
            <div class="mb-3">
                <p>Don't have account? <a href="./register.php">Register</a></p>
            </div>
        </form>

    </div>
</div>
<?php include_once "../includes/footer.php" ?>