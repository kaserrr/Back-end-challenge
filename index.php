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
                $lists = itemsSortStatus($status);
            } else if(isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                $categories = sortCategory($sort);
            }
            ?>
            <div>
                <h2>
                    <a href="./index.php?sort=ASC">Ascending</a>
                    <a href="./index.php?sort=DESC">Descending</a>
                </h2>
                <a href="./index.php?status=start">Start</a>
                <a href="./index.php?status=busy">Busy</a>
                <a href="./index.php?status=done">Done</a>
            </div>
            <?php
        foreach($categories as $category) {
            ?> 
            <div>
                <div>
                    <h1>
                        <?php echo $category['name'];?>
                        <a href="./edit.php?type=category&id=<?php echo $category['id']; ?>">Edit</a>
                        <a href="./delete.php?type=category&id=<?php echo $category['id']; ?>">Delete</a>
                        <a href="./add.php?type=item&catId=<?php echo $category['id']; ?>">Add item</a>
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
                            <h2><a href="./edit.php?type=item&id=<?php echo $item['id']; ?>">Edit</a></h2>
                            <h2><a href="./delete.php?type=item&id=<?php echo $item['id']; ?>">Delete</a></h2>
                            <h2 id="<?php echo $item['status'] ?>"><?php echo $item['status'] ?></h2>
                        </div>
                    </div>
        <?php
            } 
                }
        ?>
        <?php } ?>
        <a href="./add.php?type=category&catId=<?php echo $category['id']; ?>">Add category</a>

        <a href=""
</body>
</html>