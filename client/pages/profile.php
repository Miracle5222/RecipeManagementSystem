<?php
// Start the session
session_start();
?>
<?php include "../includes/header.php" ?>
<?php include "../includes/nav.php" ?>

<?php include "../connections/config.php" ?>

<div class="container">

    <div class="section" id="latest">


        <div class="row">
            <div class="col-lg-4 col-xlg-4 col-md-4">
                <?php


                $sql = "SELECT * from user_tbl where user_id = '   $_SESSION[id] '";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {


                ?>
                        <div class="card border-0">
                            <h2 class="text-info text-center ">Profile</h2>
                            <div class="card-body">

                                <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Username</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Staff Username" value=<?= $row['username'] ?> name="username" class="form-control p-0 border-0" required />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" placeholder="sample@admin.com" value=<?= $row['email'] ?> name="email" class="form-control p-0 border-0" id="example-email" required />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" value=<?= $row['password'] ?> name="password" class="form-control p-0 border-0" required />
                                        </div>
                                    </div>



                                    <div class="form-group mb-4">
                                        <div class="col-md-12 border-bottom p-2">
                                            <input type="submit" placeholder="123 456 7890" name="submit" class="btn btn-success " value="Update Profile" />
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                <?php  }
                } ?>
            </div>
            <div class="col-md-8">
                <h1>My Recipes</h1>
                <div class="row">
                    <div class="col-md-4">hello</div>
                    <div class="col-md-4">again</div>
                    <div class="col-md-4">again</div>
                    <div class="col-md-4">again</div>
                </div>
            </div>

        </div>


    </div>



</div>
<?php include "../includes/footer.php" ?>