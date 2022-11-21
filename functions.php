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
        $query = "DELETE FROM categories WHERE id = $id";
        $item = $GLOBALS['db']->prepare($query);
        $item->execute();

        return $item->fetchAll(\PDO::FETCH_ASSOC);
    }