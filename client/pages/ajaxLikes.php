<?php
// Start the session
session_start();
?>
<?php include "../connections/config.php" ?>
<?php


?>

<?php


if (isset($_GET['likeId'])) {

    $sqlInsert = "SELECT * FROM likes_tbl where user_id = '$_SESSION[id]'  and comment_id = '$_GET[likeId]'";
    $results = $conn->query($sqlInsert);
    $row = $results->fetch_assoc();


    if ($results->num_rows > 0) {
        if ($row['likesCount'] == 0) {
            $sql = "update likes_tbl set likesCount = 1 where comment_id = '$_GET[likeId]' and user_id =  '$_SESSION[id]' ";

            if ($conn->query($sql) === TRUE) {
                echo "like successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            $sql = "update likes_tbl set likesCount = 0 where comment_id = '$_GET[likeId]' and user_id =  '$_SESSION[id]' ";

            if ($conn->query($sql) === TRUE) {
                echo "unlike successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        $sql = "INSERT INTO likes_tbl (comment_id, likesCount,user_id )
        VALUES ('$_GET[likeId]', 1, '$_SESSION[id]')";

        if ($conn->query($sql) === TRUE) {
            echo "like successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }





?>


 


<?php
}
if (isset($_GET['likeDownId'])) {


    $sqlInsert = "SELECT * FROM likes_tbl where user_id = '$_SESSION[id]' and comment_id = '$_GET[likeDownId]' ";
    $results = $conn->query($sqlInsert);

    if ($results->num_rows <= 0) {
        $sql = "INSERT INTO likes_tbl (comment_id, likesCount,user_id )
        VALUES ('$_GET[likeDownId]', 0, '$_SESSION[id]')";

        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "already disliked";
    }





?>


 


<?php
}


$conn->close();
?>