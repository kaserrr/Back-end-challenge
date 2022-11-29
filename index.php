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
    <?php
        $categories = getCategories();
        foreach($categories as $category) {
            ?>  
            <div>
                <div>
                    <h1>
                        <?php echo $category['name'];?>
                        <a href="./editcat.php?type=category&id=<?php echo $category['id']; ?>">Edit</a>
                        <a href="./deletecat.php?type=category&id=<?php echo $category['id']; ?>">Delete</a>
                        <a href="./addcat.php?type=item&catId=<?php echo $category['id']; ?>">Add item</a>
                    </h1>
                </div>
            </div>
    <?php } ?>

    <?php
        $items = getItems();
        foreach($items as $item) {
            ?>
            <div>
                <div>
                    <h2>
                        <?php echo $item['name'];?>
                        <a href="./editcat.php?type=item&id=<?php echo $item['id']; ?>">Edit</a>
                        <a href="./deletecat.php?type=item&id=<?php echo $item['id']; ?>">Delete</a>
                    </h2>
                </div>
            </div>
    <?php } ?>
    <a href="./addcat.php?type=category&catId=<?php echo $category['id']; ?>">Add category</a>
</body>
</html>