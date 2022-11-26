<?php
// Start the session
session_start();
?>
<?php include "../includes/header.php" ?>
<?php include "../includes/nav.php" ?>

<div class="login">


    <div class="login-form">
        <?php
        if (isset($_GET['status']) && isset($_GET['message'])) { ?>
            <div class="alert alert-<?php echo $_GET['status'] ?> alert-dismissible fade show" role="alert">
                <?php echo $_GET['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php   }

        ?>
        <form class="d-flex h-100 justify-content-center align-items-center flex-column bg-light p-4" action="../control/register.php" method="post">

            <h1 class="text-dark">Register</h1>
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username" name="username" required placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password" required placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="email" required placeholder="Email">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3 button">Sign-up</button>
            </div>

        </form>

    </div>
</div>
