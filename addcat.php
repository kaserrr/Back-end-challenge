<?php
    include_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="addcat">
        <input type="submit" value="Add" name="submit">
    </form>
    <?php 
        if (isset($_GET['submit'])) {
            $catName = $_GET['addcat'];
            addCategory($catName);
            redirectPage("index.php");
        }
    ?>
</body>
</html>