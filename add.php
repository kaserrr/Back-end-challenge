<?php
    include_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Add category</title>
</head>
<body>
    <main class="container-sm">
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_GET['createCat'])) {
                $catName = $_POST['category_name'];
                addCategory($catName);
            }
            else if(isset($_GET['createItem'])) {
                if(isset($_GET['catId'])) {
                    $catId = $_GET['catId'];
                    $itemName = $_POST['item_name'];
                    $itemStatus = $_POST['status'];
                    $itemTime = $_POST['item_time'];
                    
                    addItem($itemName, $catId, $itemStatus, $itemTime);
                }
            }
        }


        function createNewCatForm($catId) {
            ?>
                <h1>new category</h1>
                <form action="./add.php?createCat=true&id=<?php echo $catId; ?>" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="category_name" id="" placeholder="category name" required>
                        <input type="submit" value="submit" class="form-control">
                    </div>
                </form>
            <?php
        }

        function createNewItemForm($catId) {
            ?>
                <h1>new item</h1>
                <form action="./add.php?createItem=true&catId=<?php echo $catId; ?>" method="post">
                    <input class="form-control" type="text" name="item_name" placeholder="item name/content" required>
                    <select name="status">
                        <option value="Start" id="start">start</option>
                        <option value="Busy" id="busy">busy</option>
                        <option value="Done" id="done">done</option>
                    </select>
                    <input class="form-control" type="text" name="item_time" placeholder="time in minutes" required>
                    <input type="submit" value="submit" class="button">
                </form>
            <?php
        }
        

        if(isset($_GET['type'])){
            $type = $_GET['type'];

            ?>
            <body>
                <a href="./index.php" ><button class="button">back</button></a>
                
            <?php

            switch($type):

                case 'category':
                    if (isset($_GET['catId'])) {
                        createNewCatForm($_GET['catId']);
                    }
                    break;


                case 'item':
                    if(isset($_GET['catId'])){
                        createNewItemForm($_GET['catId']);
                    }

                    break;
                
                default: 
                    redirectPage("./index.php");
                
                
            endswitch;


                ?>

            </body>
            </html>
            <?php
        }
        else{
            redirectPage("./index.php");
        }
    ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>