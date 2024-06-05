<?php

namespace Bookstore;

class BookStore {

    private $books;
    private $path = './data/storage.json';

    function __construct() {
        $this->books = $this->readStorage();
    }
    private function readStorage() {
        $jsonString = file_get_contents($this->path);
        $jsonData = json_decode($jsonString, true);
        return $jsonData;
    }

    private function updateStorage() {
        $jsonString = json_encode($this->books, JSON_PRETTY_PRINT);
        file_put_contents($this->path, $jsonString);
    }

    private function getId() {
        $i = 0;
        while(isset($this->books[$i])) $i++;
        return $i;
    }

    public function getBook($id){
        if (array_key_exists($id, $this->books)){
            return $this->books[$id];
        }
        return False;
    }

    public function addBook($name, $desc, $inStock){
        $book = [
            "id" => $this->getId(),
            "name" => $name,
            "description" => $desc,
            "inStock" => $inStock
        ];

        $this->books[$book['id']] = $book;
        $this->updateStorage();
    }

    public function updateBook($updatedBook) {
        $this->books[$updatedBook['id']] = $updatedBook;
        $this->updateStorage();
        return true;
    }

    public function deleteBook($books, $id) {
            unset($books[$id]);
            $this->updateStorage();
            return true;
    }

    public function displayBook($book) {
            echo "ID: " . $book['id'] . "\n";
            echo "Name: " . $book['name'] . "\n";
            echo "Description: " . $book['description'] . "\n";
            echo "In Stock: " . ($book['inStock'] ? 'Yes' : 'No') . "\n\n";
        }

    public function displayAllBooks() {
        if (empty($this->books)) {
            echo "Aucun livre disponible. \n";
        } else {
            foreach ($this->books as $book) {
                $this->displayBook($book);
            }
        }
    }
}

