<?php
    include_once 'connection.php';

    //redirects page to $location
    function redirectPage($location) {
        header('location: ' . $location);
        exit;
    }

    //gets all categories
    function getCategories() {
        $query = "SELECT * FROM categories";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //adds a new category with a name and type
    function addCategory($catName) {
        $query = "INSERT INTO categories (name, type) VALUES ('$catName','category')";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //deletes category which has the same id
    function deleteCategory($id) {
        $query = "DELETE FROM categories WHERE id = $id;
        DELETE FROM items WHERE catId = $id";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //edits category name where id is the same
    function editCategory($id, $name) {
        $query = "UPDATE categories SET name = '$name' WHERE id = '$id'";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //gets all items
    function getItems() {
        $query = "SELECT * FROM items";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //adds a new item with a name, status and the category id
    function addItem($itemName, $catId, $itemStatus, $itemTime) {
        $query = "INSERT INTO items (name, type, catId, status, time) VALUES ('$itemName','item', '$catId', '$itemStatus', '$itemTime')";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //deletes item which has the same id
    function deleteItem($id) {
        $query = "DELETE FROM items WHERE id = $id";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //edits item name and status where id is the same
    function editItem($id, $name, $status) {
        $query = "UPDATE items SET name = '$name', status = '$status' WHERE id = '$id'";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //gets a single category
    function getSingleCategory($id) {
        $query = "SELECT * From categories WHERE id = '$id'";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //gets a single item
    function getSingleItem($id) {
        $query = "SELECT * From items WHERE catid = '$id'";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    //sorts items on status
    function itemsSortStatus($status){
        switch($status){
            case 'start':
            case 'busy':
            case 'done':
                $query = "SELECT * FROM items ORDER BY FIELD(status, '$status') DESC";
                $item = $GLOBALS['db']->prepare($query);
                $item->execute();
                return $item->fetchAll(\PDO::FETCH_ASSOC);
            break;

            default:
                redirectPage("./index.php");
        }
    }

    //sorts categories on character length
    function sortCategory($sort) {
        $query = "SELECT * FROM categories ORDER BY CHAR_LENGTH(name) $sort";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }
    