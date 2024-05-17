<?php

namespace Bookstore;
require_once('/Users/robinburnay/Desktop/ESGI-DIRECTORY/Cours-IW3/ALGO/projet/vendor/autoload.php');

use Bookstore\BookFunctions;
use Bookstore\BookSort;
use Bookstore\BookDisplay;
use Bookstore\BookStore;

class MainMenu {

    private $BookFunctions;
    private $BookSort;
    private $BookDisplay;

    public function __construct() {
        $this->bookFunctions = new BookFunctions();
        $this->bookSort = new BookSort();
        $this->bookDisplay = new BookDisplay();
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

            switch(choice){
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
            $this-> bookFunctions->addBook($name, $desc, $inStock);
            echo "Livre ajouté avec Succès \n";
        }
        catch (\Exception $e) {
            echo "Erreur lors de l'ajout du livre: " . $e->getMessage() . "\n";
        }
    }
}

$menu = new MainMenu();
$menu->show();