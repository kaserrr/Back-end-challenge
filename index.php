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
    <link rel="stylesheet" href="style.css">
    <title>Main list</title>
</head>
<body>
    <?php
        $lists = getItems();
        $categories = getCategories();

            if(isset($_GET['status'])) {
                $status = $_GET['status'];
                $catId = $_GET['catId'];
                $lists = itemsSortStatus($status, $catId);
            } 

        foreach($categories as $category) {
            ?> 
            <div>
                <div>
                    <h1>
                        <?php echo $category['name'];?>
                        <a href="./editcat.php?type=category&id=<?php echo $category['id']; ?>">Edit</a>
                        <a href="./deletecat.php?type=category&id=<?php echo $category['id']; ?>">Delete</a>
                        <a href="./addcat.php?type=item&catId=<?php echo $category['id']; ?>">Add item</a>
                        <div>
                            <a href="./index.php?type=item&status=start&catId=<?php echo $category['id']; ?>">Start</a>
                            <a href="./index.php?type=item&status=busy&catId=<?php echo $category['id']; ?>">Busy</a>
                            <a href="./index.php?type=item&status=done&catId=<?php echo $category['id']; ?>">Done</a>
                        </div>
                    </h1>
                </div>
            </div>
    <?php
            foreach($lists as $item) {
                if($item['catid'] == $category['id']) {
                    ?>
                    <div>
                        <div id="listitem">
                            <h2><?php echo $item['name'];?></h2>
                            <h2><a href="./editcat.php?type=item&id=<?php echo $item['id']; ?>">Edit</a></h2>
                            <h2><a href="./deletecat.php?type=item&id=<?php echo $item['id']; ?>">Delete</a></h2>
                            <h2 id="<?php echo $item['status'] ?>"><?php echo $item['status'] ?></h2>
                        </div>
                    </div>
        <?php
            } 
                }
        ?>
        <?php } ?>
        <a href="./addcat.php?type=category&catId=<?php echo $category['id']; ?>">Add category</a>
</body>
</html>