<?php
    include_once 'connection.php';

    function redirectPage($location) {
        header('location: ' . $location);
        exit;
    }

    function getCategories() {
        $query = "SELECT * FROM categories";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function addCategory($catName) {
        $query = "INSERT INTO categories (name, type) VALUES ('$catName','category')";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function deleteCategory($id) {
        $query = "DELETE categories, items FROM categories INNER JOIN items ON categories.id = items.catId 
        WHERE items.catId = $id";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function editCategory($id, $name) {
        $query = "UPDATE categories SET name = '$name' WHERE id = '$id'";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function getItems() {
        $query = "SELECT * FROM items";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function addItem($itemName, $catId, $itemStatus) {
        $query = "INSERT INTO items (name, type, catid, status) VALUES ('$itemName','item', '$catId', '$itemStatus')";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function deleteItem($id) {
        $query = "DELETE FROM items WHERE id = $id";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function editItem($id, $name, $status) {
        $query = "UPDATE items SET name = '$name', status = '$status' WHERE id = '$id'";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function getSingleCategory($id) {
        $query = "SELECT * From categories WHERE id = '$id'";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function getSingleItem($id) {
        $query = "SELECT * From items WHERE catid = '$id'";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }

    function itemsSortStatus($status){
        switch($status){
            case 'start':
            case 'busy':
            case 'done':
                $query = "SELECT * FROM items WHERE status = '$status'";
                $item = $GLOBALS['db']->prepare($query);
                $item->execute();
                return $item->fetchAll(\PDO::FETCH_ASSOC);
            break;

            default:
                redirectPage("./index.php");
        }
    }

    function sortCategory($sort) {
        $query = "SELECT * FROM categories ORDER BY CHAR_LENGTH(name) $sort";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }
    