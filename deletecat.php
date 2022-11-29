<?php
    include_once 'functions.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        deleteCategory($id);
        redirectPage("index.php");
        echo $id;
    }

    
?>