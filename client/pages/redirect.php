<?php

if (isset($_GET['id'])) {
    header("Location:recipe.php?id=$_GET[id]#comment");
}
