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
            <div class="col-md-6">
                <h2 class="text-success">About Us</h2>
                <p>We are a group of I.T students from JHSCS College, who have come together to create a platform that will help students get the resources they need for their thesis, capstone, or research projects.

                    As students ourselves, we understand how challenging it can be to find reliable and relevant sources of information for academic projects. With the proliferation of information on the internet, it can be overwhelming to sift through all the data and determine what is trustworthy and useful.
                </p>
                <p>
                    Our team recognized the need for a centralized platform that could simplify the research process and provide students with access to high-quality resources. We have designed this system to be user-friendly, intuitive, and comprehensive. With our platform, students can search for thesis, capstone project, and research materials related to their field of study, and easily cite and reference them in their work.

                    We believe that this system will be a valuable tool for students at JHSCS College and beyond. Our team is committed to continuously improving the platform, incorporating feedback from users, and staying up-to-date with the latest developments in research and technology.

                    Thank you for visiting our page. We hope that our platform will help you achieve academic success and contribute to the advancement of knowledge in your field.</p>

            </div>
            <div class="col-md-6 justify-content-center align-items-center d-flex ">
                <img src="./logo.png" class="img-fluid" alt="Placeholder image">
            </div>
        </div>
    </div>
</section>
<section class="bg-light py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="pb-5 text-success fs 12"> School Mission And Vision</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-success">Mission</h2>
                <p class="">J.H. CERILLES STATE COLLEGE being an educational institution is tasked to be a change agent in an identified community whose main thrust is to institute community and extension projects and outreach services.</p>
                <h2 class="text-success">Vision</h2>
                <p class="fs-12">J.H. CERILLES STATE COLLEGE is in the forefront of community development particularly at the Barangay level. As leader institution, it is a vital force in the development of citizens who are capable of improving lives and the community.</p>

            </div>

        </div>
    </div>
</section>



<?php include "../includes/footer.php" ?>