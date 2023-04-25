<?php include_once "../connections/config.php" ?>

<?php
$id = $_GET['hint'];

$sql = "
SELECT * FROM recipe_tbl
WHERE title LIKE '%$id%' OR description LIKE '%$id%' 
OR TYPE LIKE '%$id%' 
OR cuisine LIKE '%$id%' OR mainIngridients LIKE '%$id%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) { ?>

        <div class="card bg-light " style="z-index: 99; position:relative;">
            <div class="card-body py-2">
                <h5 class="card-title"><?= $row["title"] ?></h5>
                <p class="card-text text-truncate"><?= $row["description"] ?></p>
                <a href="./recipe.php?id=<?= $row['recipe_id'] ?>" class="btn" style="background-color:orange;color:black;font-family:sans-serif; font-weight:400;">Go to Recipe</a>
            </div>
        </div>

<?php
    }
    echo "</table>";
}
$conn->close();
?>