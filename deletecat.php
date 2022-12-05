<?php
    include_once 'functions.php';


    if(isset($_GET['id']) && isset($_GET['type'])){
        
        $id = $_GET['id'];
        $type = $_GET['type'];

        switch ($type):
            case 'category':
                deleteCategory($id);
                redirectPage("./index.php");
                break;
            
            case 'item':
                deleteItem($id);   
                redirectPage("./index.php");  
                break; 
        endswitch;
    }
?>