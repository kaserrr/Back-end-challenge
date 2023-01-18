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
    <title>Add category</title>
</head>
<body>
<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_GET['createCat'])){
            $catName = $_POST['category_name'];
            addCategory($catName);
        }
        else if(isset($_GET['createItem'])) {
            if(isset($_GET['catId'])){

                $catId = $_GET['catId'];
                $itemName = $_POST['item_name'];
                $itemStatus = $_POST['status'];
                
                addItem($itemName, $catId, $itemStatus);
            }
        }
    }


    function createNewCatForm() {
        ?>
            <h1>new category</h1>
            <form action="./add.php?createCat=true" method="post">
                <input class="input is-primary" type="text" name="category_name" id="" placeholder="category name" required>
                <input type="submit" value="submit" class="button">
            </form>
        <?php
    }

    function createNewItemForm($catId) {
        ?>
            <h1>new item</h1>
            <form action="./add.php?createItem=true&catId=<?php echo $catId; ?>" method="post">
                <input class="input is-primary" type="text" name="item_name" placeholder="item name/content" required>
                <select name="status">
                    <option value="Start" id="start">start</option>
                    <option value="Busy" id="busy">busy</option>
                    <option value="Done" id="done">done</option>
                </select>

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
                createNewCatForm();
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
</body>
</html>