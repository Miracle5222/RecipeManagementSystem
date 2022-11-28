<?php include "../connections/config.php" ?>
<?php

$array1 = array();
$array2 = array();
$query = "SELECT ROUND(AVG(comment_tbl.`ratings`),1) AS rounded , recipe_tbl.`title` , recipe_tbl.`recipe_id`FROM recipe_tbl INNER JOIN comment_tbl ON comment_tbl.`recipe_id` = recipe_tbl.`recipe_id` GROUP BY recipe_tbl.`recipe_id`";
$results = $conn->query($query);


if ($results->num_rows > 0) {

    while ($row = $results->fetch_assoc()) {
        $array2['averageRatings'] =  $row['rounded'];
        $array2['title'] =  $row['title'];

        array_push($array1, $array2);
    }
}
$message = $array1;

echo json_encode($message);
