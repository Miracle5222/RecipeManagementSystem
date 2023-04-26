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
                    <!-- <a class="nav-link" href="./control/logout.php">Logout</a>
                    <a class="nav-link" href="./control/logout.php">Sign-In</a> -->
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
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 bg-light " style="padding:20px;">

                <h2 class="text-success">About Us</h2>
                <p style="font-size: large;">Welcome to our platform! We are a team of passionate students from JHCSC School who have come together to develop a recipe management system. Our platform is designed to cater to the needs of students, restaurant owners, and food enthusiasts alike.

                    Our team has spent countless hours researching, designing, and developing this system to ensure that it meets the highest standards of quality and usability. We understand the importance of having access to reliable and easy-to-use recipe management tools, and that's why we created this platform.

                    Our system is user-friendly, allowing users to easily search for recipes based on various criteria such as cuisine, ingredients and more. We also provide a feature for users to create their recipe collections, making it easy to organize and access their favorite recipes.

                    Whether you're a student looking for inspiration for your next culinary project, a restaurant owner in need of a menu revamp, or a food enthusiast searching for new recipes to try, our recipe management system has got you covered. We're excited to share our platform with you and look forward to helping you discover your next favorite recipe!
                </p>

            </div>
            <div class="col-md-6 justify-content-center align-items-center d-flex ">
                <img src="./logo.png" class="img-fluid" alt="Placeholder image">
            </div>
        </div>
    </div>
</section>
<section class="bg-light py-5 " style="margin-top:250px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="pb-5 text-success text-lg"> School Mission And Vision</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-success">Mission</h3>
                <p style="font-size: large;">J.H. CERILLES STATE COLLEGE being an educational institution is tasked to be a change agent in an identified community whose main thrust is to institute community and extension projects and outreach services.</p>
                <h3 class="text-success">Vision</h3>
                <p style="font-size: large;">J.H. CERILLES STATE COLLEGE is in the forefront of community development particularly at the Barangay level. As leader institution, it is a vital force in the development of citizens who are capable of improving lives and the community.</p>

            </div>

        </div>
    </div>
</section>



<?php include "../includes/footer.php" ?>