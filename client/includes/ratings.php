
<?php


$sql = "SELECT * from ratings_tbl where recipe_id = $row[recipe_id]";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
print_r($rows);
