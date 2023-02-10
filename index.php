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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Main list</title>
</head>
<body>
    <main class="container">
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
                    <a href="./index.php?sort=ASC" class="btn btn-primary">Ascending</a>
                    <a href="./index.php?sort=DESC" class="btn btn-primary">Descending</a>
                </h2>
                    <a href="./index.php?status=start" class="btn btn-secondary">Start</a>
                    <a href="./index.php?status=busy" class="btn btn-secondary">Busy</a>
                    <a href="./index.php?status=done" class="btn btn-secondary">Done</a>
            </div>
        <section class="container-fluid">
            <div class="row">
                <?php foreach($categories as $category) { ?> 
                    <div class="col-4 border border-primary">
                        <div>
                            <h1>
                                <?php echo $category['name'];?>
                                <a href="./edit.php?type=category&id=<?php echo $category['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="./delete.php?type=category&id=<?php echo $category['id']; ?>" class="btn btn-primary">Delete</a>
                                <a href="./add.php?type=item&catId=<?php echo $category['id']; ?>" class="btn btn-primary">Add item</a>
                            </h1>
                        </div>
                <?php
                    foreach($lists as $item) {
                        if($item['catId'] == $category['id']) {
                ?>
                            <div>
                                <div id="listitem" class="d-inline-flex p-2">
                                    <h3><?php echo $item['name'];?></h3>
                                    <h3><a href="./edit.php?type=item&id=<?php echo $item['id']; ?>" class="btn btn-secondary">Edit</a></h3>
                                    <h3><a href="./delete.php?type=item&id=<?php echo $item['id']; ?>" class="btn btn-secondary">Delete</a></h3>
                                    <h3 id="<?php echo $item['status'] ?>"><?php echo $item['status'] ?></h3>
                                </div>
                            </div>
                <?php
                        } 
                    }
                ?>
                    </div>
                <?php } ?>
            </div>
        </section>
        <a href="./add.php?type=category&catId=<?php echo $category['id']; ?>" class="btn btn-success">Add category</a>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>