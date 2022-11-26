
<?php include_once "../connections/config.php" ?>
<?php

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


$sql = "SELECT * from user_tbl where username = '$username' || email = '$email'";
$result = $conn->query($sql);


$status = "";
$message = "";
if ($result->num_rows > 0) {
    $message  .= "Username and Email already exist!";
    $status .= "danger";
    header("Location: ../pages/register.php?status=$status&message=$message");
} else {
    $message  .= "Register Successfully";
    $status .= "success";
    $sql = "INSERT INTO user_tbl (username,password,email) values ('$username ','$password ','$email ')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/register.php?status=$status&message=$message");
    }
}




$conn->close();
