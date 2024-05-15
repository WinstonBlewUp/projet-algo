<?php

namespace Bookstore;

class BookFunctions{

    function addBook(&$books, $name, $desc, $inStock){

        static $id = 1;

        $book = [
            "id" => $id++,
            "name" => $name,
            "description" => $desc,
            "inStock" => $inStock
        ];

        $books[] = $book;
    }

    function updateBook(&$books, $id, $newName, $newDesc, $newInStock) {
        foreach ($books as &$book) {
            if ($book['id'] === $id) {
                $book['name'] = $newName;
                $book['description'] = $newDesc;
                $book['inStock'] = $newInStock;
                return true;
            }
        }
        return false;
    }

    function deleteBook(&$books, $id) {
        foreach ($books as $key => $book) {
            if ($book['id'] === $id) {
                unset($books[$key]);
                return true;
            }
        }
        return false;
    }
}