
<?php include_once "../connections/config.php" ?>
<?php


$sql = "SELECT * from user_tbl";
$result = $conn->query($sql);

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($username == $row['username']) {
            echo "alert(username already exist)";
            header("Location: ../pages/login.php");
        } else {
            $sql = "INSERT INTO user_tbl (username,password,email) values ('$username ','$password ','$email ')";
            header("Location: ../pages/login.php");
        }
    }
} else {
    echo "no records found";
}




$conn->close();
