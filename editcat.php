<?php
    include_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit cat</title>
</head>
<body>
    <a href="./index.php"><button class="button">back</button></a>
            <form action="" method="post">
                <Label>Naam:</Label>
                <input type="text" name="editcat">
                <input type="submit" class="button" name="submit">
            </form>
    <?php
        if (!empty($_POST)) {
            $id = $_GET['id'];
            $name = $_POST['editcat'];
            echo $name;
            editCategory($id, $name);   
            redirectPage("index.php");
        }
    ?>
</body>
</html>