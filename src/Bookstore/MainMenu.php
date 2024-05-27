<?php

namespace Bookstore;

use Bookstore\Bookstore;

class MainMenu {

    private $bookstore;

    public function __construct() {
        $this->bookstore = new BookStore();
    }

    public function show(){
        while(true){
            echo " \n Menu Principal - Bookstore \n";
            echo "1. Ajouter un livre \n";
            echo "2. Modifier un livre \n";
            echo "3. Supprimer un livre \n";
            echo "4. Afficher un livre \n";
            echo "5. Afficher tous les livres triés \n";
            echo "0. Quitter \n";

            $choice = trim(fgets(STDIN));

            switch($choice){
                case '1': $this->addBookInterface();
                break;
                case '2': $this->updateBookInterface();
                break;
                case '3': $this->deleteBookInterface();
                break;
                case '4': $this->displayBookInterface();
                break;
                case '5': $this->displayAllBooksInterface();
                break;

                case '0':
                    exit("Merci d'avoir utilisé notre système.\n");
                default:
                    echo "Option invalide, veuillez réessayer.\n";
            }
        }
    }

    private function addBookInterface(){
        echo "Entrez le nom du livre : \n";
        $name = trim(fgets(STDIN));
        echo "Entrez une description : \n"; 
        $desc = trim(fgets(STDIN));
        echo "Le livre est-il en stock ? \n";
        $inStock = strtolower(trim(fgets(STDIN))) === 'oui';

        try{
            $this->bookstore->addBook($name, $desc, $inStock);
            echo "Livre ajouté avec succès \n";
        }
        catch (\Exception $e) {
            echo "Erreur lors de l'ajout du livre: " . $e->getMessage() . "\n";
        }
    }

    private function updateBookInterface(){
        echo "Entrez l'id du livre à modifier : \n";
        $id = trim(fgets(STDIN));
        $book = $this->bookstore->getBook($id);
        if ($book) {
            while(true){
            echo "Voulez vous modifier le livre \"".$book['name']."\" ? (Y/N)\n";
            $check = trim(fgets(STDIN));
            switch($check){
                case 'Y':
                    echo "Entrez le nom du livre : \n";
                    $book['name'] = trim(fgets(STDIN));
                    echo "Entrez une description : \n"; 
                    $book['description'] = trim(fgets(STDIN));
                    echo "Le livre est-il en stock ? \n";
                    $book['inStock'] = strtolower(trim(fgets(STDIN))) === 'oui';
                    try{
                        $this->bookstore->updateBook($book);
                        echo "Livre modifié avec succès \n";
                    }
                    catch (\Exception $e) {
                        echo "Erreur lors de l'ajout du livre: " . $e->getMessage() . "\n";
                    }
                    break 2;
                case 'N':
                    break 2;
            }
        }
        }
        else {
            echo "L'id : ".$id." ne correspond à aucun livre de notre stockage\n";
        }
    }

    private function deleteBookInterface(){
        //TODO
    }

    private function displayBookInterface(){
        echo "Entrez l'id du livre à afficher : \n";
        $id = trim(fgets(STDIN));
        $book = $this->bookstore->getBook($id);
        if ($book) {
            $this->bookstore->displayBook($book);
        }
        else {
            echo "L'id : ".$id." ne correspond à aucun livre de notre stockage\n";
        }
    }

    private function displayAllBooksInterface(){
        $this->bookstore->displayAllBooks();
    }
}

$menu = new MainMenu();
$menu->show();