<?php
    include_once 'functions.php';
    include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main list</title>
</head>
<body>
    <a href="addcat.php">Add cat</a>
    <?php
        $categories = getCategories();
        foreach($categories as $category){
            ?>  
            <div class="column is-one-third">
                <div class="title">
                    <h1>
                        <?php echo $category['name'];?>

                        <a href="./editcat.php?type=category&id=<?php echo $category['id']; ?>">Edit</a>
                        <a href="./deletecat.php?type=category&id=<?php echo $category['id']; ?>">Delete</a>
                    </h1>
                </div>
        <?php } ?>
</body>
</html>