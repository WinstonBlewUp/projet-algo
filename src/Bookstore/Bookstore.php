<?php

namespace Bookstore;

class BookStore {

    private $books;

    function __construct() {
        $this->books = [];
    }

    public function getBook($id){
        if (array_key_exists($id, $this->books)){
            return $this->books[$id];
        }
        else {
            return False;
        }
    }

    public function addBook($name, $desc, $inStock){
        static $id = 0;

        $book = [
            "id" => ++$id,
            "name" => $name,
            "description" => $desc,
            "inStock" => $inStock
        ];

        $this->books[$id] = $book;
    }

    public function updateBook($updatedBook) {
        $this->books[$updatedBook['id']] = $updatedBook;
        return true;
    }

    public function deleteBook($books, $id) {
        foreach ($books as $key => $book) {
            if ($book['id'] === $id) {
                unset($books[$key]);
                return true;
            }
        }
        return false;
    }

    public function displayBook($books, $id) {
        foreach ($books as $book) {
            if ($book['id'] === $id) {
                echo "ID: " . $book['id'] . "\n";
                echo "Name: " . $book['name'] . "\n";
                echo "Description: " . $book['description'] . "\n";
                echo "In Stock: " . ($book['inStock'] ? 'Yes' : 'No') . "\n";
                return;
            }
        }
        echo "Livre non trouvé.";
    }

    public function displayAllBooks($books) {
        if (empty($books)) {
            echo "Aucun livre disponible. \n";
        } else {
            foreach ($books as $book) {
                echo "ID: " . $book['id'] . "\n";
                echo "Name: " . $book['name'] . "\n";
                echo "Description: " . $book['description'] . "\n";
                echo "In Stock: " . ($book['inStock'] ? 'Yes' : 'No') . "\n";
                echo "\n";
            }
        }
    }
}

