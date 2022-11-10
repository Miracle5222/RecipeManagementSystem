<?php
// Start the session
session_start();
?>
<?php include_once "../connections/config.php" ?>
<?php

$sql = "SELECT * from user_tbl";
$result = $conn->query($sql);

$username = $_POST['username'];
$password = $_POST['password'];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($username != $row['username'] && $password != $row["password"]) {

            header("Location: ../pages/login.php");
        } else {
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header("Location: ../index.php");
        }
    }
} else {
    echo "no records found";
}
$conn->close();
