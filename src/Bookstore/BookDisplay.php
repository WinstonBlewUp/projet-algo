<?php

namespace Bookstore;

class BookDisplay{
    /*function displayBook($books, $id) {
        foreach ($books as $book) {
            if ($book['id'] === $id) {
                echo "ID: " . $book['id'] . "<br>";
                echo "Name: " . $book['name'] . "<br>";
                echo "Description: " . $book['description'] . "<br>";
                echo "In Stock: " . ($book['inStock'] ? 'Yes' : 'No') . "<br><br>";
                echo "<hr/>";
                return;
            }
        }
        echo "Livre non trouvé.";
    }*/

    function displayBook($books, $id) {
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

    /*function displayAllBooks($books) {
        if (empty($books)) {
            echo "Aucun livre disponible.<br><br>";
        } else {
            foreach ($books as $book) {
                echo "ID: " . $book['id'] . "<br>";
                echo "Name: " . $book['name'] . "<br>";
                echo "Description: " . $book['description'] . "<br>";
                echo "In Stock: " . ($book['inStock'] ? 'Yes' : 'No') . "<br><br>";
                echo "<hr/>";
            }
        }
    }*/

    function displayAllBooks($books) {
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