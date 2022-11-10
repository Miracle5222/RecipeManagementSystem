<?php
// Start the session
session_start();
?>
<?php include_once "../includes/header.php" ?>
<?php include_once "../includes/nav.php" ?>

<div class="login">


    <div class="login-form">

        <form class="d-flex h-100 justify-content-center align-items-center flex-column" action="../control/login.php" method="post">
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
                <button type="submit" class="btn btn-primary mb-3 button">Login</button>
            </div>
            <div class="mb-3">
                <p>Don't have account? <a href="./register.php">Register</a></p>
            </div>
        </form>

    </div>
</div>
<?php include_once "../includes/footer.php" ?>