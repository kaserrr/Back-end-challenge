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
        <?php function editCat() { ?>
            <form action="./editcat.php?type=category&id=<?php echo $_GET['id']; ?>" method="post">
                <Label>Naam:</Label>
                <input type="text" name="name">
                <input type="submit" class="button" name="submit">
            </form>
        <?php } ?>

        <?php function editItems() { ?>
            <form action="./editcat.php?type=item&id=<?php echo $_GET['id']; ?>" method="post">
                <Label>Naam:</Label>
                <input type="text" name="name">
                <select name="status">
                    <option value="Start">Start</option>
                    <option value="Busy">Busy</option>
                    <option value="Done">Done</option>
                </select>
                <input type="submit" class="button" name="submit">
            </form> 
        <?php } ?>
    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_GET['type']) && isset($_GET['id'])) {
            $type = $_GET['type'];
            $id = $_GET['id'];
            
            switch($type):

                case 'category':
                    editCategory($id, $_POST['name']);
                    redirectPage("./index.php");
                break;

                case 'item':
                    echo $_POST['status'];
                    editItem($id, $_POST['name'], $_POST['status']);
                    redirectPage("./index.php");
                break;

                default:
                    redirectPage("./index.php");
            endswitch;
            
        }
    }   else {
            if(isset($_GET['type']) && isset($_GET['id'])) {
                $id = $_GET['id'];
                $type = $_GET['type'];
    
                switch($type):
                    case 'category':
                            $item = getSingleCategory($id);                                
                            editCat();
                        break;
                    
                    case 'item':
                            $item = getSingleItem($id);
                            editItems();
                        break;
    
                    default:
                        redirectPage("./index.php");
                        break;
                endswitch;
            }
            else{
                redirectPage("./index.php");    
            }
        }
    ?>
</body>
</html>