<?php

namespace Bookstore;

use Bookstore\Bookstore;

class Menus {

    private $bookstore;
    private $history;

    public function __construct() {
        $this->bookstore = new BookStore();
        $this->history = new History();
        $this->mainInterface();
    }

    public function mainInterface(){
            echo " \n Menu Principal - Bookstore \n";
            echo "1. Ajouter un livre \n";
            echo "2. Modifier un livre \n";
            echo "3. Supprimer un livre \n";
            echo "4. Afficher un livre \n";
            echo "5. Afficher tous les livres \n";
            echo "6 Afficher tous les livres triés \n";
            echo "7 Recherche\n";
            echo "8 Historique\n";
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
                case '6': $this->displayAllBooksSortedInterface();
                break;
                case '7': $this->searchInterface();
                break;
                case '8': $this->showHistory();
                break;
                case '0':
                    exit("Merci d'avoir utilisé notre système.\n");
                default:
                    echo "Option invalide, veuillez réessayer.\n";
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
            $this->history->logCommand("ajout");
        }
        catch (\Exception $e) {
            echo "Erreur lors de l'ajout du livre: " . $e->getMessage() . "\n";
        }
        $this->mainInterface();
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
                        $this->history->logCommand("modification");
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
        $this->mainInterface();
    }

    private function deleteBookInterface(){
        echo "Entrez l'id du livre à supprimer : \n";
        $id = trim(fgets(STDIN));
        $book = $this->bookstore->getBook($id);
        if ($book) {
            while(true){
            echo "Voulez vous supprimer le livre \"".$book['name']."\" ? (Y/N)\n";
            $check = trim(fgets(STDIN));
            switch($check){
                case 'Y':
                    try{
                        $this->bookstore->deleteBook($id);
                        echo "Livre supprimé avec succès \n";
                        $this->history->logCommand("suppression");
                    }
                    catch (\Exception $e) {
                        echo "Erreur lors de la suppression du livre: " . $e->getMessage() . "\n";
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
    $this->mainInterface();
}

    private function displayBookInterface(){
        echo "Entrez l'id du livre à afficher : \n";
        $id = trim(fgets(STDIN));
        $book = $this->bookstore->getBook($id);
        if ($book) {
            $this->bookstore->displayBook($book);
            $this->history->logCommand("affichage");
        }
        else {
            echo "L'id : ".$id." ne correspond à aucun livre de notre stockage\n";
        }
        $this->mainInterface();
    }

    private function displayAllBooksInterface($sortedBooks = NULL){
        $this->bookstore->displayAllBooks($sortedBooks);
        $this->history->logCommand("liste");
        $this->mainInterface();
    }

    private function displayAllBooksSortedInterface(){
        $attribute = $this->selectAtribute();
        if ($attribute === "id"){
            $this->displayAllBooksInterface();
        }
        else{
            $sortedBooks = $this->bookstore->sortBooksByAtribute($attribute);
            $this->displayAllBooksInterface($sortedBooks);
        }
        $this->history->logCommand("tri");
        $this->mainInterface();
    }
    
    private function searchInterface(){
        //TODO
        $this->history->logCommand("recherche");
        $this->mainInterface();
    }

    private function selectAtribute(){
        while(true){
            echo "Selectionner un attribut :\n";
            echo "1. ID \n";
            echo "2. NOM \n";
            echo "3. DESCRIPTION\n";
            $attribute = trim(fgets(STDIN));
            switch($attribute){
                case '1':
                    return "id";
                case '2':
                    return "name";
                case '3':
                    return "description";
            }
        }
    }

    private function showHistory(){
        $this->history->displayHistory();
        $this->mainInterface();
    }
}